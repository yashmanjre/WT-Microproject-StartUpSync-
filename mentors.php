<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>StartUpSync — Mentors</title>

  <!-- Google Font -->
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
      --glass-weak: rgba(255, 255, 255, 0.02);
      --glass-strong: rgba(255, 255, 255, 0.04);
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

    /* NAV (exact as index) */
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

    /* page specifics */
    .mentor-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      margin-top: 18px;
    }

    .mentor-card {
      background: rgba(255, 255, 255, 0.02);
      padding: 18px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.03);
    }

    .mentor-name {
      font-weight: 700;
      font-size: 18px;
    }

    .mentor-meta {
      color: var(--muted);
      margin-top: 6px;
      font-size: 13px;
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
      display: inline-block;
      text-decoration: none;
    }

    @media (max-width:920px) {
      .container {
        padding: 30px 5vw;
      }

      nav {
        padding: 12px 18px;
      }
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
      <a href="mentors.php" style="color:#fff;">Mentors</a>
      <a href="learning.php">Learning</a>
      <a href="dashboard.php">Dashboard</a>

    </div>
  </nav>


  <div class="spacer" aria-hidden="true"></div>

  <div class="container">
    <div class="card-gradient">
      <h2 style="margin-top:0">Mentor Directory</h2>
      <p class="muted">Browse mentors and request a short, simulated session. Requests are stored locally (demo).</p>

      <div class="mentor-grid" id="mentorGrid">
        <!-- mentor cards inserted by JS -->
      </div>
    </div>

    <div style="margin-top:22px;" class="card-gradient">
      <h3 style="margin-top:0">Request a Mentor (Demo)</h3>
      <p class="muted">This form saves your request to local storage — no emails are sent.</p>
      <div style="margin-top:12px;">
        <label class="muted">Your name</label>
        <input id="rname" style="width:100%; padding:10px; border-radius:8px; border:1px solid rgba(255,255,255,0.04); background:transparent; color:inherit;">
        <label class="muted" style="margin-top:8px; display:block;">Select mentor</label>
        <select id="rmentor" style="width:100%; padding:10px; border-radius:8px; border:1px solid rgba(255,255,255,0.04); background:transparent; color:inherit;">
        </select>
        <label class="muted" style="margin-top:8px; display:block;">Short message</label>
        <textarea id="rmsg" style="width:100%; padding:10px; border-radius:8px; border:1px solid rgba(255,255,255,0.04); background:transparent; color:inherit;"></textarea>
        <div style="margin-top:12px; display:flex; gap:10px;">
          <button id="sendReq" class="btn">Send Request</button>
          <div id="reqStatus" class="muted" style="align-self:center;"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // sample mentors
    const mentors = [{
        name: 'Dr. Aisha Khan',
        field: 'Product Strategy',
        exp: '10 yrs',
        bio: 'Product-market fit, customer discovery'
      },
      {
        name: 'Mr. Rajesh Patel',
        field: 'Growth & Marketing',
        exp: '12 yrs',
        bio: 'Growth experiments, UA'
      },
      {
        name: 'Ms. Lina Gomez',
        field: 'Design & UX',
        exp: '8 yrs',
        bio: 'UI, prototyping, usability'
      },
      {
        name: 'Mr. Karan Mehta',
        field: 'Technology',
        exp: '9 yrs',
        bio: 'MVP architecture, scaling'
      },
      {
        name: 'Ms. Priya Nair',
        field: 'Operations',
        exp: '7 yrs',
        bio: 'Supply chain & ops for hardware'
      },
      {
        name: 'Mr. Sameer Rao',
        field: 'Finance',
        exp: '11 yrs',
        bio: 'Unit economics & fundraising'
      }
    ];

    function renderMentors() {
      const grid = document.getElementById('mentorGrid');
      const select = document.getElementById('rmentor');
      grid.innerHTML = '';
      select.innerHTML = '';
      mentors.forEach(m => {
        const card = document.createElement('div');
        card.className = 'mentor-card';
        card.innerHTML = `<div class="mentor-name">${m.name}</div>
                          <div class="mentor-meta">${m.field} · ${m.exp}</div>
                          <div style="margin-top:8px;color:var(--muted)">${m.bio}</div>
                          <button class="btn" style="margin-top:12px;" onclick="requestMentor('${m.name}')">Request</button>`;
        grid.appendChild(card);
        const opt = document.createElement('option');
        opt.value = m.name;
        opt.textContent = m.name;
        select.appendChild(opt);
      });
    }

    function requestMentor(name) {
      alert('Request sent to ' + name + ' (simulated).');
    }

    // save mentor requests to localStorage
    document.getElementById('sendReq').addEventListener('click', () => {
      const name = document.getElementById('rname').value.trim();
      const mentor = document.getElementById('rmentor').value;
      const msg = document.getElementById('rmsg').value.trim();
      const status = document.getElementById('reqStatus');
      if (!name || !msg) {
        status.textContent = 'Please enter name and message.';
        return;
      }
      const arr = JSON.parse(localStorage.getItem('mentor_requests') || '[]');
      arr.push({
        name,
        mentor,
        msg,
        time: Date.now()
      });
      localStorage.setItem('mentor_requests', JSON.stringify(arr));
      status.textContent = 'Request saved (simulated).';
      document.getElementById('rname').value = '';
      document.getElementById('rmsg').value = '';
      setTimeout(() => status.textContent = '', 2500);
    });

    // reveal effect copied from index (adds 'visible' when in viewport)
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

    renderMentors();
  </script>
</body>

</html>