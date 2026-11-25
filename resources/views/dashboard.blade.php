<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Agrani Bank PLC | Resignation Management</title>
    <style>
        :root { color-scheme: light; --navy:#12345a; --blue:#145da0; --teal:#138a72; --gold:#d8aa43; --muted:#667085; --line:#e4e9f0; --bg:#f4f7fb; }
        * { box-sizing:border-box; }
        body { margin:0; background:var(--bg); color:#172b4d; font:15px/1.5 system-ui,-apple-system,"Segoe UI",sans-serif; }
        header { background:var(--navy); color:#fff; padding:16px max(24px,calc((100% - 1180px)/2)); display:flex; align-items:center; justify-content:space-between; gap:20px; }
        .brand { display:flex; align-items:center; gap:14px; }
        .mark { width:42px;height:42px;border-radius:50%;display:grid;place-items:center;background:#fff;color:var(--navy);font-weight:800; }
        .brand strong { display:block;font-size:16px;letter-spacing:.02em; }
        .brand small { color:#d5e0ec; }
        .shell { max-width:1180px;margin:30px auto;padding:0 24px; }
        .heading { display:flex;justify-content:space-between;align-items:flex-start;gap:20px;margin-bottom:24px; }
        h1 { margin:0 0 5px;font-size:27px;color:var(--navy); }
        p { margin:0;color:var(--muted); }
        .badge { display:inline-block;padding:6px 11px;background:#e8f5f1;color:#08765e;border-radius:20px;font-size:12px;font-weight:700;white-space:nowrap; }
        .grid { display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px; }
        .card { background:#fff;border:1px solid var(--line);border-radius:10px;padding:20px;box-shadow:0 2px 8px #18324b08; }
        .metric { min-height:128px; }
        .metric-label { color:var(--muted);font-size:13px; }
        .metric-value { font-size:29px;font-weight:700;color:var(--navy);margin-top:12px; }
        .section { margin-top:22px; }
        h2 { font-size:18px;margin:0 0 14px;color:var(--navy); }
        .policy { display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px; }
        .policy-item { padding:15px;border-left:3px solid var(--blue);background:#f8fafc;border-radius:4px; }
        .policy-item strong { display:block;margin-bottom:5px;color:var(--navy); }
        .policy-item span { color:var(--muted);font-size:13px; }
        .notice { margin-top:20px;padding:14px 16px;border:1px solid #f0dfb8;background:#fffaf0;border-radius:8px;color:#735516;font-size:13px; }
        footer { max-width:1180px;margin:28px auto;padding:16px 24px;color:var(--muted);font-size:12px;border-top:1px solid var(--line); }
        @media(max-width:850px) { .grid{grid-template-columns:repeat(2,minmax(0,1fr));}.policy{grid-template-columns:1fr;} }
        @media(max-width:520px) { .grid{grid-template-columns:1fr;}.heading{display:block}.badge{margin-top:14px;}header{padding:14px 20px;} }
    </style>
</head>
<body>
<header>
    <div class="brand">
        <div class="mark" aria-hidden="true">AB</div>
        <div><strong>Agrani Bank PLC</strong><small>Employee Resignation &amp; Clearance Management</small></div>
    </div>
    <span aria-label="Application environment">Management Portal</span>
</header>
<main class="shell">
    <div class="heading">
        <div>
            <h1>Resignation Management Dashboard</h1>
            <p>Central overview of resignation applications, branch clearances and financial settlements.</p>
        </div>
        <span class="badge">Policy configured · Pay Scale-2026</span>
    </div>

    <section class="grid" aria-label="Dashboard summary">
        <article class="card metric"><div class="metric-label">Resignation Applications</div><div class="metric-value">—</div></article>
        <article class="card metric"><div class="metric-label">Pending Branch Clearances</div><div class="metric-value">—</div></article>
        <article class="card metric"><div class="metric-label">Pending Financial Settlements</div><div class="metric-value">—</div></article>
        <article class="card metric"><div class="metric-label">Pending Head Office Approvals</div><div class="metric-value">—</div></article>
    </section>

    <section class="card section">
        <h2>Configured resignation policy</h2>
        <div class="policy">
            <div class="policy-item"><strong>One year of service or more</strong><span>Three months' Basic Salary recovery may apply when the required three months' notice is not served.</span></div>
            <div class="policy-item"><strong>Under one year of service</strong><span>One month's Basic Salary recovery may apply when the required one month's notice is not served.</span></div>
            <div class="policy-item"><strong>Effective-dated salary scale</strong><span>Pay Scale-2026 effective date: 1 July 2026. Historical salary records must be retained.</span></div>
        </div>
    </section>

    <div class="notice"><strong>Initial application foundation:</strong> dashboard metrics and workflow links will populate after authentication, employee, branch-clearance and approval modules are implemented. Do not use this initial foundation to process live employee or financial records.</div>
</main>
<footer>Agrani Bank PLC · Resignation, Branch Clearance &amp; Financial Settlement Management</footer>
</body>
</html>
