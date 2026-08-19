<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        :root {
            --apotek-bg: #061a1d;
            --apotek-bg-soft: #0d2a2f;
            --apotek-card: #0f3338;
            --apotek-primary: #39d0cf;
            --apotek-primary-strong: #1fb7b3;
            --apotek-accent: #dffdfd;
            --apotek-text: #ebffff;
            --apotek-muted: #b6d9d7;
            --apotek-border: rgba(117, 255, 247, 0.17);
            --apotek-shadow: rgba(9, 39, 43, 0.45);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(180deg, #041516 0%, #071f22 100%);
            color: var(--apotek-text);
            line-height: 1.6;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        .container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        /* Admin Header */
        .admin-header-bar {
            background: rgba(5, 24, 27, 0.95);
            border-bottom: 1px solid var(--apotek-border);
            padding: 18px 0;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .admin-header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .admin-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-logo img {
            width: 48px;
            height: 48px;
        }

        .admin-logo h2 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--apotek-primary), var(--apotek-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Admin Sidebar Nav */
        .admin-nav {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .admin-nav a {
            padding: 10px 18px;
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--apotek-border);
            font-weight: 600;
            font-size: 0.92rem;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .admin-nav a:hover,
        .admin-nav a.active {
            background: rgba(57, 208, 207, 0.15);
            border-color: var(--apotek-primary);
            color: var(--apotek-primary);
        }

        .admin-nav-logout {
            background: rgba(220, 38, 38, 0.1) !important;
            border-color: rgba(220, 38, 38, 0.3) !important;
            color: #fca5a5 !important;
        }

        .admin-nav-logout:hover {
            background: rgba(220, 38, 38, 0.2) !important;
            border-color: rgba(220, 38, 38, 0.5) !important;
        }

        .admin-container {
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }

        .admin-welcome {
            margin-bottom: 40px;
        }

        .admin-welcome h1 {
            font-size: 2.2rem;
            margin: 0 0 10px;
            letter-spacing: -0.02em;
        }

        .admin-welcome p {
            color: var(--apotek-muted);
            margin: 0;
            font-size: 1.05rem;
        }

        .admin-menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .admin-menu-card {
            background: linear-gradient(135deg, rgba(15, 51, 56, 0.8), rgba(9, 29, 32, 0.8));
            border: 1px solid var(--apotek-border);
            border-radius: 20px;
            padding: 32px 24px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            display: block;
        }

        .admin-menu-card:hover {
            transform: translateY(-8px);
            border-color: var(--apotek-primary);
            box-shadow: 0 20px 40px rgba(57, 208, 207, 0.2);
        }

        .menu-icon {
            font-size: 3.5rem;
            margin-bottom: 16px;
            display: block;
        }

        .admin-menu-card h3 {
            font-size: 1.4rem;
            margin: 16px 0 10px;
            letter-spacing: -0.01em;
        }

        .admin-menu-card p {
            color: var(--apotek-muted);
            margin: 0;
            font-size: 0.95rem;
        }

        /* Admin Form Container */
        .admin-form-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .admin-form-header {
            margin-bottom: 32px;
        }

        .admin-form-header h1 {
            font-size: 2rem;
            margin: 0 0 8px;
            letter-spacing: -0.02em;
        }

        .admin-form-header p {
            color: var(--apotek-muted);
            margin: 0;
        }

        .admin-back-btn {
            display: inline-block;
            margin-bottom: 24px;
            color: var(--apotek-primary);
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .admin-back-btn:hover {
            transform: translateX(-4px);
        }

        /* Admin Table */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .admin-table thead {
            background: rgba(57, 208, 207, 0.1);
            border-bottom: 2px solid var(--apotek-border);
        }

        .admin-table th {
            padding: 16px;
            text-align: left;
            font-weight: 800;
            color: var(--apotek-primary);
            font-size: 0.95rem;
        }

        .admin-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--apotek-border);
        }

        .admin-table tbody tr:hover {
            background: rgba(57, 208, 207, 0.08);
        }

        /* Form Styling */
        .form-box {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 700;
            color: var(--apotek-text);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--apotek-border);
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            color: var(--apotek-text);
            font-size: 0.96rem;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--apotek-primary);
            background: rgba(57, 208, 207, 0.08);
            box-shadow: 0 0 0 3px rgba(57, 208, 207, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 13px 28px;
            font-weight: 800;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.96rem;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--apotek-primary), var(--apotek-primary-strong));
            color: #062026;
            box-shadow: 0 10px 20px rgba(57, 208, 207, 0.25);
        }

        .btn-secondary {
            border: 1px solid var(--apotek-border);
            background: rgba(255,255,255,0.02);
            color: var(--apotek-text);
        }

        .btn-danger {
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.3);
            color: #fca5a5;
        }

        .btn-danger:hover {
            background: rgba(220, 38, 38, 0.25);
        }

        .btn-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .site-footer {
            border-top: 1px solid var(--apotek-border);
            background: rgba(4, 18, 20, 0.9);
            padding: 28px 0 42px;
            margin-top: 60px;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-meta {
            color: var(--apotek-muted);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .admin-header-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-nav {
                width: 100%;
                flex-wrap: wrap;
            }

            .admin-menu-grid {
                grid-template-columns: 1fr;
            }

            .form-box {
                padding: 20px;
            }

            .admin-welcome h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header-bar">
        <div class="container admin-header-inner">
            <div class="admin-logo">
                <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo">
                <h2>Admin Dashboard</h2>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.banner.index') }}" class="{{ request()->routeIs('admin.banner.*') ? 'active' : '' }}">Banner</a>
                <a href="{{ route('admin.partner.index') }}" class="{{ request()->routeIs('admin.partner.*') ? 'active' : '' }}">Mitra</a>
                <a href="{{ route('admin.content.index') }}" class="{{ request()->routeIs('admin.content.*') ? 'active' : '' }}">Konten</a>
                <a href="{{ route('home') }}" class="btn btn-secondary" style="padding: 10px 18px; font-size: 0.92rem; border-radius: 12px;">Lihat Beranda</a>
                <form method="POST" action="{{ route('auth.logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn admin-nav-logout" style="padding: 10px 18px; font-size: 0.92rem;">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="container footer-inner">
            <div style="display: flex; align-items: center; gap: 12px;">
                <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo" style="width: 44px; height: 44px;">
                <span style="font-weight: 800; font-size: 1.2rem;">Apotek Alfa Group</span>
            </div>
            <div class="footer-meta">© {{ date('Y') }} Apotek Alfa Group · Admin Dashboard</div>
        </div>
    </footer>
</body>
</html>
