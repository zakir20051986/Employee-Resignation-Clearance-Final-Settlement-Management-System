<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign in | Agrani Bank PLC</title>
    <style>
        :root { --navy:#12345a; --blue:#145da0; --muted:#667085; --line:#dde5ef; --bg:#edf3f8; }
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; display:grid; place-items:center; background:linear-gradient(135deg,#edf3f8 0%,#f8fafc 60%,#e5edf5 100%); color:#172b4d; font:15px/1.5 system-ui,-apple-system,"Segoe UI",sans-serif; }
        .login-shell { width:min(920px,calc(100% - 32px)); min-height:540px; display:grid; grid-template-columns:1fr 420px; overflow:hidden; border-radius:12px; background:#fff; border:1px solid var(--line); box-shadow:0 20px 55px rgba(18,52,90,.14); }
        .identity { padding:48px; color:#fff; background:linear-gradient(145deg,var(--navy),#1b5e99); display:flex; flex-direction:column; justify-content:space-between; }
        .brand-mark { width:58px;height:58px;border-radius:50%;display:grid;place-items:center;background:#fff;color:var(--navy);font-weight:800;font-size:18px;margin-bottom:20px; }
        .identity h1 { margin:0 0 12px;font-size:28px;line-height:1.25; }
        .identity p { margin:0;max-width:360px;color:#dbe7f2;font-size:14px; }
        .identity footer { color:#bfd0df;font-size:12px; }
        .form-panel { padding:48px 44px; display:flex; flex-direction:column; justify-content:center; }
        .form-panel h2 { margin:0 0 6px;color:var(--navy);font-size:24px; }
        .subtitle { margin:0 0 28px;color:var(--muted);font-size:13px; }
        label { display:block;margin:16px 0 7px;font-weight:700;font-size:13px;color:#344054; }
        input { width:100%;height:44px;border:1px solid #cfd8e4;border-radius:7px;padding:0 12px;font:inherit;color:#172b4d;outline:none; }
        input:focus { border-color:var(--blue);box-shadow:0 0 0 3px rgba(20,93,160,.12); }
        .options { display:flex;justify-content:space-between;align-items:center;margin:15px 0 22px;font-size:13px;color:var(--muted); }
        .remember { display:flex;align-items:center;gap:7px; }
        .remember input { width:auto;height:auto; }
        a { color:var(--blue);text-decoration:none; }
        button { width:100%;height:46px;border:0;border-radius:7px;background:var(--navy);color:#fff;font-weight:700;font-size:14px;cursor:pointer; }
        button:hover { background:#184872; }
        .security-note { margin-top:18px;color:#667085;font-size:12px;text-align:center; }
        @media(max-width:760px) { .login-shell{grid-template-columns:1fr}.identity{min-height:220px;padding:32px}.identity footer{display:none}.form-panel{padding:36px 28px;} }
        @media(max-width:440px) { body{place-items:start}.login-shell{width:100%;min-height:100vh;border:0;border-radius:0}.identity{min-height:200px;} }
    </style>
</head>
<body>
<main class="login-shell">
    <section class="identity">
        <div>
            <div class="brand-mark" aria-hidden="true">AB</div>
            <h1>Resignation, Clearance &amp; Final Settlement</h1>
            <p>Secure workforce administration for Agrani Bank PLC employees, branch users and Head Office officers.</p>
        </div>
        <footer>Agrani Bank PLC · Authorized access only</footer>
    </section>

    <section class="form-panel">
        <h2>Sign in</h2>
        <p class="subtitle">Enter your organizational credentials to continue.</p>

        @if ($errors->any())
            <div style="padding:10px 12px;margin-bottom:10px;border-radius:6px;background:#fff1f0;color:#b42318;font-size:13px">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email or Personnel ID</label>
            <input id="email" name="email" type="text" value="{{ old('email') }}" autocomplete="username" required autofocus>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <div class="options">
                <label class="remember"><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit">Sign in securely</button>
        </form>
        <p class="security-note">Protected organizational system · Do not share your credentials</p>
    </section>
</main>
</body>
</html>
