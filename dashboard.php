<?php
session_start();
$loggedIn = isset($_SESSION['user_name']) && $_SESSION['user_name'] !== '';
$user = $loggedIn ? $_SESSION['user_name'] : '';
$initial = $loggedIn ? strtoupper(mb_substr($user, 0, 1)) : '';
$logo = '/mnt/data/A_2D_digital_illustration_showcases_the_landing_pa.png';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>StartUpSync — Dashboard</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />

  <style>
    :root {
      --bg: #0f1226;
      --card: #0f1724;
      --muted: #9aa4c0;
      --accent1: #6c7bff;
      --accent2: #9b5cff;
      --neon: linear-gradient(360deg, var(--accent1), var(--accent2));
    }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, Arial;
      background:
        radial-gradient(1200px 600px at 10% 10%, rgba(108, 123, 255, 0.06), transparent),
        radial-gradient(900px 400px at 90% 90%, rgba(155, 92, 255, 0.04), transparent),
        var(--bg);
      color: #e6eef8;
    }

    /* -------------------------------- NAVBAR -------------------------------- */
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
      overflow: hidden;
    }

    .logo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
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
      text-decoration: none;
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

    /* -------------------------------- PAGE CONTENT -------------------------------- */
    .container {
      max-width: 1000px;
      margin: 50px auto;
      padding: 24px;
    }

    h1 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .card {
      background: rgba(255, 255, 255, 0.03);
      padding: 22px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.04);
    }

    .small {
      font-size: 13px;
      color: #bfc6d9;
      margin-bottom: 18px;
    }

    /* Dashboard post grid */
    .posts {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 18px;
      margin-top: 18px;
    }

    .post {
      background: var(--card);
      padding: 16px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.04);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
    }

    .meta {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .avatar {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      color: #fff;
      flex-shrink: 0;
    }

    .post-title {
      font-weight: 700;
      margin: 8px 0 6px;
    }

    .post-body {
      color: var(--muted);
      font-size: 14px;
    }

    .post-image {
      width: 100%;
      border-radius: 8px;
      margin-top: 10px;
      display: block;
    }

    .actions {
      display: flex;
      gap: 10px;
      margin-top: 12px;
    }

    .btn-sm {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      border: 1px solid rgba(255, 255, 255, 0.04);
      color: var(--muted);
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
    }

    .btn-sm.liked {
      color: #fff;
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
    }

    .comments {
      margin-top: 10px;
      display: none;
      border-top: 1px dashed rgba(255, 255, 255, 0.03);
      padding-top: 8px;
      color: var(--muted);
    }

    .comment {
      margin-top: 6px;
      font-size: 13px;
    }

    /* create post button (disabled) */
    .create {
      display: inline-block;
      margin-bottom: 12px;
      padding: 10px 14px;
      border-radius: 10px;
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
      color: white;
      font-weight: 700;
      opacity: 0.7;
      cursor: not-allowed;
      text-decoration: none;
    }

    @media (max-width:700px) {
      .container {
        padding: 16px;
        margin: 40px 12px;
      }

      nav {
        padding: 12px 18px;
      }

      .brand h1 {
        font-size: 16px;
      }
    }
  </style>
</head>

<body>

  <!-- -------- SAME NAVBAR AS reference -------- -->
  <nav>
    <div class="brand">
      <div class="logo" aria-hidden="true">S </div>
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
      <a href="learning.php">Learning</a>
      <a href="dashboard.php" style="color:#fff;">Dashboard</a>


    </div>
  </nav>

  <div class="spacer"></div>

  <!-- -------- PAGE CONTENT -------- -->
  <div class="container">
    <h1>Community Dashboard</h1>
    <p class="small">Static posts from the community. "Create post" is visible but disabled for this prototype.</p>

    <a class="create" href="#" onclick="return false;">+ Create Post</a>

    <div class="posts">

      <!-- Post 1 -->
      <article class="post">
        <div class="meta">
          <div class="avatar">A</div>
          <div>
            <div style="font-weight:800">Ananya</div>
            <div style="font-size:12px;color:var(--muted)">2 hours ago</div>
          </div>
        </div>

        <div class="post-title">AI Garden Watering System</div>
        <div class="post-body">A smart irrigation system that waters plants based on moisture and sunlight prediction to save water.</div>



        <div class="actions">
          <button class="btn-sm like-btn">❤ Like</button>
          <button class="btn-sm comment-btn">💬 Comments</button>
        </div>

        <div class="comments">
          <div class="comment"><strong>Rohit:</strong> Great idea — could integrate weather API.</div>
        </div>
      </article>

      <!-- Post 2 -->
      <article class="post">
        <div class="meta">
          <div class="avatar">R</div>
          <div>
            <div style="font-weight:800">Rohan</div>
            <div style="font-size:12px;color:var(--muted)">1 day ago</div>
          </div>
        </div>

        <div class="post-title">Campus Ride Sharing App</div>
        <div class="post-body">Students traveling similar routes can share rides and split costs — safer and cheaper.</div>

        <div class="actions">
          <button class="btn-sm like-btn">❤ Like</button>
          <button class="btn-sm comment-btn">💬 Comments</button>
        </div>

        <div class="comments"></div>
      </article>

      <!-- Post 3 -->
      <article class="post">
        <div class="meta">
          <div class="avatar">P</div>
          <div>
            <div style="font-weight:800">Priya</div>
            <div style="font-size:12px;color:var(--muted)">3 days ago</div>
          </div>
        </div>

        <div class="post-title">Smart Bottle Recycler</div>
        <div class="post-body">A machine that gives small rewards when users insert plastic bottles — encourages recycling.</div>



        <div class="actions">
          <button class="btn-sm like-btn">❤ Like</button>
          <button class="btn-sm comment-btn">💬 Comments</button>
        </div>

        <div class="comments">
          <div class="comment"><strong>Ananya:</strong> This would be perfect for our college festival.</div>
        </div>
      </article>

      <!-- add more static posts here if you like -->

    </div>
  </div>

  <script>
    // toggle profile menu
    (function() {
      const profileBtn = document.getElementById('profileBtn');
      const profileMenu = document.getElementById('profileMenu');
      if (profileBtn && profileMenu) {
        profileBtn.addEventListener('click', (e) => {
          e.stopPropagation();
          profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
        });
        document.addEventListener('click', () => profileMenu.style.display = 'none');
      }
    })();

    // very simple like/comment toggles
    document.querySelectorAll('.like-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        btn.classList.toggle('liked');
        if (btn.classList.contains('liked')) {
          btn.textContent = '✓ Liked';
          btn.classList.add('liked');
        } else {
          btn.textContent = '❤ Like';
          btn.classList.remove('liked');
        }
      });
    });

    document.querySelectorAll('.comment-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const comments = btn.closest('.post').querySelector('.comments');
        if (!comments) return;
        comments.style.display = comments.style.display === 'block' ? 'none' : 'block';
      });
    });
  </script>
</body>

</html>