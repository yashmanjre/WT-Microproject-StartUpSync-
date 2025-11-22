<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>StartUpSync — Pitch Generator</title>

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

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #d1d8e6;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            background: transparent;
            color: inherit;
        }

        .btn {
            background: linear-gradient(90deg, #6c7bff, #9b5cff);
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            font-weight: 700;
            transition: opacity 200ms;
        }

        .btn:hover {
            opacity: 0.9;
        }

        #copyBtn {
            background: #445;
        }

        #downloadBtn {
            background: #333;
        }

        .pitch-output {
            white-space: pre-wrap;
            background: rgba(255, 255, 255, 0.02);
            padding: 18px;
            border-radius: 8px;
            margin-top: 24px;
            border: 1px solid rgba(255, 255, 255, 0.03);
            min-height: 150px;
            font-family: monospace;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <!-- -------- SAME NAVBAR AS index.html -------- -->
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
            <a href="pitch_generator.php" style="color:#fff;">Pitch Deck</a>
            <a href="mentors.php">Mentors</a>
            <a href="learning.php">Learning</a>
            <a href="dashboard.php">Dashboard</a>

        </div>
    </nav>
    <div class="spacer"></div>

    <!-- -------- PAGE CONTENT -------- -->
    <div class="container">
        <h1>Pitch Deck Generator</h1>

        <div class="card">
            <p class="small">Fill the fields below and click Generate to create a structured, one-page pitch ready for presentation.</p>

            <label for="title">Idea title</label>
            <input id="title" placeholder="EcoWash — Smart laundry pods" />

            <label for="problem">Problem (one sentence)</label>
            <input id="problem" placeholder="Households waste water and energy on small loads." />

            <label for="solution">Solution (one sentence)</label>
            <input id="solution" placeholder="Subscription pods + app dosing to reduce waste." />

            <label for="market">Target market</label>
            <input id="market" placeholder="Urban households & laundromats" />

            <div style="margin-top:24px;display:flex;gap:10px">
                <button class="btn" id="genBtn">Generate Pitch</button>
                <button class="btn" id="copyBtn">Copy</button>
                <button class="btn" id="downloadBtn">Download</button>
            </div>

            <div id="pitch" class="pitch-output">Your generated pitch will appear here.</div>
        </div>
    </div>

    <scri