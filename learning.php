<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>StartUpSync — Learning</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <style>
    /* copied exact styles from your index.html (keeps navbar identical) */
    :root {
      --bg: #0f1226;
      --card: #0f1724;
      --muted: #9aa4c0;
      --accent1: #6c7bff;
      --accent2: #9b5cff;
      --neon: linear-gradient(360deg, var(--accent1), var(--accent2));
      --max-width: 1100px;
    }

    * {
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
    }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background:
        radial-gradient(1200px 600px at 10% 10%, rgba(108, 123, 255, 0.06), transparent),
        radial-gradient(900px 400px at 90% 90%, rgba(155, 92, 255, 0.04), transparent),
        var(--bg);
      color: #e6eef8;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      scroll-behavior: smooth;
      line-height: 1.45;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    nav {
      position: fixed;
      left: 0;
      right: 0;
      top: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 36px;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      border-bottom: 1px solid rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(10px);
    }

    .brand {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--neon);
      font-weight: 850;
      font-size: 30px;
      color: white;
    }

    .brand h1 {
      font-size: 18px;
      margin: 0;
    }

    .brand p {
      margin: 0;
      font-size: 12px;
      color: var(--muted);
    }

    .nav-links {
      display: flex;
      gap: 18px;
      align-items: center;
    }

    .nav-links a {
      color: var(--muted);
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 8px;
    }

    .nav-links a:hover {
      color: #fff;
      background: rgba(255, 255, 255, 0.02);
    }

    .cta {
      padding: 9px 14px;
      border-radius: 10px;
      background: var(--neon);
      color: white;
      font-weight: 700;
    }

    .spacer {
      height: 84px;
    }

    .container {
      max-width: var(--max-width);
      width: 100%;
      margin: 0 auto;
      padding: 40px 6vw;
    }

    .card-gradient {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      padding: 26px;
      border-radius: 14px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
      border: 1px solid rgba(255, 255, 255, 0.04);
    }

    .muted {
      color: var(--muted);
    }

    /* learning UI */
    .module {
      margin-top: 16px;
      padding: 16px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.03);
    }

    .module h3 {
      margin: 0;
    }

    .progress {
      height: 10px;
      background: rgba(255, 255, 255, 0.03);
      border-radius: 8px;
      overflow: hidden;
      margin-top: 8px;
    }

    .progress>i {
      display: block;
      height: 100%;
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
      width: 0%;
      transition: width 300ms;
    }

    .btn {
      background: var(--neon);
      color: white;
      padding: 8px 12px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-weight: 700;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <nav>
    <div class="brand">
      <div class="logo" aria-hidden="true">S</div>
      <div>
        <h1>StartUpSync</h1>
        <p class="muted">Innovation & Mentorship</p>
      </div>
    </div>

    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="idea_engine.php">Idea Engine</a>
      <a href="pitch_generator.php">Pitch Deck</a>
      <a href="mentors.php">Mentors</a>
      <a href="learning.php" style="color:#fff;">Learning</a>
      <a href="dashboard.php">Dashboard</a>

    </div>
  </nav>

  <div class="spacer" aria-hidden="true"></div>

  <div class="container">
    <div class="card-gradient">
      <h2 style="margin-top:0">Learning Modules</h2>
      <p class="muted">Short lessons to help you build and validate ideas. Progress is saved locally in your browser (demo).</p>

      <div id="modules">
        <div class="module">
          <h3>Module 1 — Problem Discovery</h3>
          <div class="muted">Learn how to find real customer problems.</div>
          <div class="progress"><i id="p1"></i></div>
          <button class="btn" onclick="complete(1)">Mark Complete</button>
        </div>

        <div class="module">
          <h3>Module 2 — Build an MVP</h3>
          <div class="muted">Plan a minimal version to validate assumptions.</div>
          <div class="progress"><i id="p2"></i></div>
          <button class="btn" onclick="complete(2)">Mark Complete</button>
        </div>

        <div class="module">
          <h3>Module 3 — Pitch & Metrics</h3>
          <div class="muted">How to craft a one-page pitch and measure traction.</div>
          <div class="progress"><i id="p3"></i></div>
          <button class="btn" onclick="complete(3)">Mark Complete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function updateUI() {
      const prog = JSON.parse(localStorage.getItem('learning_prog') || '{}');
      document.getElementById('p1').style.width = (prog[1] ? '100%' : '0%');
      document.getElementById('p2').style.width = (prog[2] ? '100%' : '0%');
      document.getElementById('p3').style.width = (prog[3] ? '100%' : '0%');
    }

    function complete(n) {
      const prog = JSON.parse(localStorage.getItem('learning_prog') || '{}');
      prog[n] = true;
      localStorage.setItem('learning_prog', JSON.stringify(prog));
      updateUI();
      alert('Marked complete (simulated).');
    }
    (function initRevealOnScroll() {
      const options = {
        threshold: 0.12
      };
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) entry.target.classList.add('visible');
        });
      }, options);
      document.querySelectorAll('.card-gradient').forEach(node => observer.observe(node));
    })();
    updateUI();
  </script>
</body>

</html>