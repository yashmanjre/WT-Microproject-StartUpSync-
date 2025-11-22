<?php
// login.php - fixed version
// NOTE: session_start and POST handling MUST be above any HTML output.
session_start();

// For debugging, you can enable error display during development:
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');

  // Demo auth: accept any non-empty values (replace with DB auth & password_verify)
  if ($email !== '' && $password !== '') {
    $name = explode('@', $email)[0];
    $_SESSION['user_name'] = ucfirst($name);

    // redirect back to the page the user came from or to index.php
    $redirect = $_POST['redirect'] ?? 'index.php';
    // ensure $redirect is a local path for safety in demo:
    if (!preg_match('#^https?://#i', $redirect)) {
      header("Location: " . $redirect);
      exit;
    } else {
      // if external URL passed, use safe default
      header("Location: index.php");
      exit;
    }
  } else {
    $error = "Invalid credentials (demo). Please fill both fields.";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login — StartUpSync</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    /* (kept the CSS you already liked) */
    :root {
      --bg: #0f1226;
      --muted: #9aa4c0;
      --accent1: #6c7bff;
      --accent2: #9b5cff;
      --glass: rgba(255, 255, 255, 0.04);
      --max-w: 980px;
    }

    * {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%
    }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      background:
        radial-gradient(900px 400px at 10% 10%, rgba(108, 123, 255, 0.06), transparent),
        radial-gradient(700px 300px at 90% 90%, rgba(155, 92, 255, 0.04), transparent),
        var(--bg);
      color: #e6eef8;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 28px;
    }

    .page {
      width: 100%;
      max-width: var(--max-w);
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 36px
    }

    .hero {
      padding: 36px
    }

    .brand {
      display: flex;
      gap: 14px;
      align-items: center;
      margin-bottom: 18px
    }

    .brand .logo {
      width: 64px;
      height: 64px;
      border-radius: 14px;
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 22px;
      color: #fff
    }

    h1 {
      margin: 0 0 10px;
      font-size: 28px
    }

    p.lead {
      color: var(--muted);
      margin: 0 0 18px;
      font-size: 15px;
      max-width: 38ch
    }

    .card {
      width: 100%;
      max-width: 420px;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      border: 1px solid var(--glass);
      box-shadow: 0 12px 40px rgba(2, 6, 23, 0.6);
      padding: 26px;
      border-radius: 14px;
      backdrop-filter: blur(6px)
    }

    .card h2 {
      margin: 0 0 8px;
      font-size: 20px
    }

    .card p.small {
      margin: 0 0 16px;
      color: var(--muted);
      font-size: 13px
    }

    label {
      display: block;
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 8px;
      font-weight: 600
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 14px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.04);
      background: transparent;
      color: inherit;
      outline: none;
      font-size: 15px;
      transition: box-shadow .18s, border-color .18s
    }

    input::placeholder {
      color: #9aa4c0
    }

    input:focus {
      box-shadow: 0 6px 22px rgba(107, 123, 255, 0.08);
      border-color: rgba(108, 123, 255, 0.6)
    }

    .form-row {
      margin-bottom: 12px
    }

    .actions {
      display: flex;
      gap: 12px;
      align-items: center;
      margin-top: 12px
    }

    .btn {
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
      color: white;
      padding: 11px 14px;
      border-radius: 10px;
      border: none;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 8px 30px rgba(107, 90, 255, 0.12)
    }

    .btn-ghost {
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.04);
      color: var(--muted);
      padding: 10px 12px;
      border-radius: 10px;
      cursor: pointer
    }

    .helper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 8px;
      font-size: 13px;
      color: var(--muted)
    }

    .error {
      color: #ffb4b4;
      background: rgba(255, 80, 80, 0.06);
      padding: 10px;
      border-radius: 8px;
      border: 1px solid rgba(255, 80, 80, 0.08);
      margin-bottom: 12px
    }

    .foot {
      margin-top: 12px;
      font-size: 12px;
      color: var(--muted);
      text-align: center
    }

    @media (max-width:980px) {
      .page {
        grid-template-columns: 1fr;
        gap: 18px;
        padding: 16px
      }
    }
  </style>
</head>

<body>

  <main style="width:100%;max-width:1100px;margin:40px auto;padding:20px">
    <div class="page" role="main">
      <div class="hero" aria-hidden="true">
        <div class="brand">
          <div class="logo">S</div>
          <div>
            <div style="font-weight:800;font-size:18px">StartUpSync</div>
            <div style="font-size:13px;color:var(--muted)">Innovation & Mentorship</div>
          </div>
        </div>

        <h1>Welcome back — sign in to continue</h1>
        <p class="lead">Access your saved ideas, generate pitches, connect with mentors and share on the community dashboard.</p>

        <div style="margin-top:24px;color:var(--muted);font-size:13px">Demo login accepts any non-empty email & password. Replace with secure DB auth when ready.</div>
      </div>

      <aside>
        <div class="card" role="form" aria-labelledby="signin-heading">
          <h2 id="signin-heading">Sign in</h2>
          <p class="small">Enter your credentials to unlock your dashboard.</p>

          <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
          <?php endif; ?>

          <form method="post" novalidate>
            <div class="form-row">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" placeholder="you@example.com" required>
            </div>

            <div class="form-row password-row">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" placeholder="••••••••" required>
              <button type="button" class="toggle-pass" id="togglePass" aria-label="Show password">Show</button>
            </div>

            <div class="helper" style="margin-top:6px">
              <label style="display:flex;align-items:center;gap:8px;color:var(--muted);font-weight:500">
                <input type="checkbox" name="remember" style="transform:scale(1.05)"> Remember me
              </label>
              <a href="#" onclick="alert('Password reset not implemented in demo');return false;">Forgot?</a>
            </div>

            <!-- pass referring page to redirect back -->
            <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'index.php'); ?>">

            <div class="actions" style="margin-top:16px">
              <button class="btn" type="submit">Sign in</button>
              <a class="btn-ghost" href="index.php">Back</a>
            </div>

            <div class="foot">Don't have an account? <a href="signup.php" style="color:#fff">Sign Up</a></div>
          </form>
        </div>
      </aside>
    </div>
  </main>

  <script>
    // show/hide password toggle
    (function() {
      const pw = document.getElementById('password');
      const btn = document.getElementById('togglePass');
      if (!pw || !btn) return;
      btn.addEventListener('click', () => {
        if (pw.type === 'password') {
          pw.type = 'text';
          btn.textContent = 'Hide';
          btn.setAttribute('aria-pressed', 'true');
        } else {
          pw.type = 'password';
          btn.textContent = 'Show';
          btn.setAttribute('aria-pressed', 'false');
        }
        pw.focus();
      });
    })();
  </script>

</body>

</html>