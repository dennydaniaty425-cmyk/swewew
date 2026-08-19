<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apotek Alfa Group')</title>
    <meta name="description" content="Apotek Alfa Group menyediakan obat, vitamin, dan layanan kesehatan terpercaya untuk keluarga Anda.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <style>
        :root {
            --apotek-bg: #071b1d;
            --apotek-bg-soft: #0d2f31;
            --apotek-card: #123a3b;
            --apotek-primary: #47d6b0;
            --apotek-primary-strong: #0ca58d;
            --apotek-accent: #d7fff3;
            --apotek-text: #effffc;
            --apotek-muted: #a8cfca;
            --apotek-border: rgba(120, 229, 211, 0.18);
            --apotek-shadow: rgba(0, 0, 0, 0.35);
            --apotek-success: #67e0b4;
            --apotek-warning: #f4c95d;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: 'DM Sans', ui-sans-serif, sans-serif;
            background: linear-gradient(180deg, #061719 0%, var(--apotek-bg) 100%);
            color: var(--apotek-text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, .brand-name, .eyebrow, .btn, .stat strong {
            font-family: 'Manrope', 'DM Sans', sans-serif;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        .container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(12px);
            background: rgba(7, 27, 29, 0.88);
            border-bottom: 1px solid var(--apotek-border);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 82px;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .brand-logo {
            width: 58px;
            height: 58px;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 0 12px rgba(57, 208, 207, 0.28));
        }

        .brand-name {
            font-size: clamp(1.35rem, 2vw, 2rem);
            color: var(--apotek-primary);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .nav a {
            color: var(--apotek-muted);
            font-size: 0.96rem;
            font-weight: 600;
            transition: color 0.2s ease, transform 0.2s ease, background 0.2s ease, border-color 0.2s ease;
        }

        .nav a:hover,
        .nav a.active {
            color: var(--apotek-text);
        }

        .nav a:hover {
            transform: translateY(-1px);
        }

        .nav-cta {
            padding: 12px 20px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--apotek-primary) 0%, var(--apotek-primary-strong) 100%);
            color: #062026 !important;
            font-weight: 800;
            box-shadow: 0 10px 18px rgba(57, 208, 207, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
        }

        .nav-cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 22px rgba(57, 208, 207, 0.32);
            filter: brightness(1.04);
        }

        .floating-support {
            position: fixed;
            right: 18px;
            bottom: 20px;
            z-index: 999;
            width: 58px;
            height: 58px;
            border: none;
            border-radius: 50%;
            background: linear-gradient(135deg, #17494a 0%, #0c2b2d 100%);
            border: 1px solid rgba(71, 214, 176, 0.55);
            box-shadow: 0 18px 32px rgba(0, 0, 0, 0.32), 0 0 18px rgba(71, 214, 176, 0.16);
            color: var(--apotek-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .floating-support:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 22px 38px rgba(0, 0, 0, 0.4), 0 0 24px rgba(71, 214, 176, 0.24);
        }

        .nav-toggle {
            display: none;
            width: 48px;
            height: 48px;
            border: 1px solid var(--apotek-border);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.02);
            cursor: pointer;
            padding: 0;
            align-items: center;
            justify-content: center;
            transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
        }

        .nav-toggle:hover {
            background: rgba(57, 208, 207, 0.08);
            border-color: rgba(57, 208, 207, 0.3);
            transform: translateY(-1px);
        }

        .nav-toggle-bar {
            position: relative;
            width: 22px;
            height: 2px;
            background: var(--apotek-text);
            border-radius: 999px;
            transition: transform 0.25s ease, opacity 0.25s ease;
        }

        .nav-toggle-bar::before,
        .nav-toggle-bar::after {
            content: "";
            position: absolute;
            left: 0;
            width: 22px;
            height: 2px;
            background: var(--apotek-text);
            border-radius: 999px;
            transition: transform 0.25s ease;
        }

        .nav-toggle-bar::before { top: -7px; }
        .nav-toggle-bar::after { top: 7px; }

        .nav-toggle.is-active .nav-toggle-bar {
            background: transparent;
        }

        .nav-toggle.is-active .nav-toggle-bar::before {
            transform: translateY(7px) rotate(45deg);
        }

        .nav-toggle.is-active .nav-toggle-bar::after {
            transform: translateY(-7px) rotate(-45deg);
        }

        .section {
            padding: 96px 0;
        }

        .hero {
            position: relative;
            padding: 96px 0 112px;
            background:
                radial-gradient(circle at 82% 8%, rgba(71, 214, 176, 0.2), transparent 30%),
                radial-gradient(circle at 8% 20%, rgba(12, 165, 141, 0.16), transparent 26%),
                linear-gradient(135deg, #0b292b 0%, #071b1d 100%);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 36px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 18px;
            padding: 8px 14px;
            border: 1px solid var(--apotek-border);
            border-radius: 999px;
            background: rgba(57, 208, 207, 0.08);
            color: var(--apotek-primary);
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        h1, h2, h3 {
            margin: 0 0 16px;
            line-height: 1.12;
            letter-spacing: -0.04em;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 5rem);
            margin-bottom: 20px;
            color: var(--apotek-text);
        }

        .hero p {
            color: var(--apotek-muted);
            font-size: 1.08rem;
            max-width: 620px;
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 28px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 15px 26px;
            font-weight: 800;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--apotek-primary), var(--apotek-primary-strong));
            color: #062026;
            box-shadow: 0 16px 22px rgba(57, 208, 207, 0.2);
        }

        .btn-secondary {
            border: 1px solid var(--apotek-border);
            background: rgba(255,255,255,0.02);
            color: var(--apotek-text);
        }

        .btn-login {
            width: 100%;
            padding: 16px 24px !important;
            font-size: 1rem !important;
            font-weight: 900 !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            box-shadow: 0 12px 24px rgba(57, 208, 207, 0.3) !important;
            border: 1px solid rgba(57, 208, 207, 0.5) !important;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 18px 36px rgba(57, 208, 207, 0.4) !important;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(-1px) scale(0.98) !important;
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 28px;
            margin-top: 32px;
        }

        .stat strong {
            display: block;
            font-size: 1.8rem;
            color: var(--apotek-primary);
        }

        .stat span {
            color: var(--apotek-muted);
            font-size: 0.88rem;
        }

        .hero-card {
            background: rgba(18, 58, 59, 0.78);
            border: 1px solid var(--apotek-border);
            border-radius: 28px;
            padding: 26px;
            box-shadow: 0 24px 40px var(--apotek-shadow);
            backdrop-filter: blur(10px);
        }

        .page-about .hero-card {
            display: grid;
            gap: 16px;
            align-self: start;
        }

        .mini-card {
            margin-top: 16px;
            padding: 20px 22px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(57, 208, 207, 0.08), rgba(82, 214, 165, 0.04));
            border: 1px solid rgba(57, 208, 207, 0.18);
            transition: all 0.3s ease;
        }

        .mini-card:hover {
            border-color: rgba(57, 208, 207, 0.28);
            background: linear-gradient(135deg, rgba(57, 208, 207, 0.12), rgba(82, 214, 165, 0.08));
        }

        .page-about .mini-card {
            margin-top: 0;
        }

        .mini-card h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 1.15rem;
            color: var(--apotek-primary);
        }

        .mini-card p,
        .service-card p,
        .process-card p,
        .contact-card p,
        .info-card p,
        .contact-list li,
        .about-copy p {
            margin: 0;
            color: var(--apotek-muted);
        }

        .feature-grid,
        .info-grid,
        .contact-grid,
        .process-grid {
            display: grid;
            gap: 22px;
        }

        .feature-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .service-card,
        .info-card,
        .contact-card,
        .process-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 22px;
            padding: 28px 24px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .service-card:hover,
        .process-card:hover,
        .info-card:hover,
        .contact-card:hover {
            transform: translateY(-6px);
            border-color: rgba(8, 127, 115, 0.38);
            box-shadow: 0 18px 34px rgba(26, 83, 77, 0.13);
        }

        .icon-badge {
            width: 52px;
            height: 52px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: rgba(57, 208, 207, 0.12);
            border: 1px solid rgba(57, 208, 207, 0.2);
            font-size: 1.5rem;
            margin-bottom: 16px;
        }

        .section-head {
            margin-bottom: 28px;
        }

        .section-head h2 {
            font-size: clamp(2rem, 3vw, 3rem);
            margin-bottom: 10px;
        }

        .section-head p {
            max-width: 680px;
            margin: 0;
            color: var(--apotek-muted);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 28px;
            align-items: center;
        }

        .page-about .about-grid {
            grid-template-columns: minmax(0, 1.45fr) minmax(280px, 0.75fr);
            align-items: start;
        }

        .about-copy {
            display: grid;
            gap: 18px;
        }

        .page-about .about-copy {
            align-content: start;
        }

        .about-box {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 22px;
            padding: 22px;
            height: auto;
        }

        .about-box ul {
            margin: 0;
            padding-left: 18px;
            color: var(--apotek-muted);
            display: grid;
            gap: 10px;
        }

        .branch-title {
            margin: 0 0 20px;
            font-size: 1.15rem;
            color: var(--apotek-primary);
            font-weight: 700;
        }

        .branch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 18px;
        }

        .branch-item {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .branch-item:hover {
            border-color: var(--apotek-primary);
            background: rgba(57, 208, 207, 0.04);
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(57, 208, 207, 0.12);
        }

        .branch-image {
            width: 100%;
            aspect-ratio: 4 / 3;
            background: linear-gradient(135deg, rgba(57, 208, 207, 0.12), rgba(57, 208, 207, 0.06));
            border-bottom: 1px solid var(--apotek-border);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .branch-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .branch-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(57, 208, 207, 0.08), rgba(57, 208, 207, 0.04));
            color: var(--apotek-primary);
        }

        .branch-info {
            padding: 14px 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .branch-name {
            display: block;
            margin-bottom: 8px;
            color: var(--apotek-text);
            font-size: 0.96rem;
            font-weight: 800;
            line-height: 1.3;
        }

        .branch-address {
            color: var(--apotek-muted);
            font-size: 0.82rem;
            line-height: 1.5;
            flex-grow: 1;
        }

        .pill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 12px;
            margin-top: 18px;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 14px;
            min-height: 42px;
            border-radius: 999px;
            background: rgba(82, 214, 165, 0.1);
            border: 1px solid rgba(82, 214, 165, 0.3);
            color: var(--apotek-success);
            font-size: 0.82rem;
            font-weight: 700;
            line-height: 1.2;
            white-space: nowrap;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.02);
        }

        .contact-grid {
            grid-template-columns: 1.1fr 0.9fr;
        }

        .contact-list {
            display: grid;
            gap: 14px;
            list-style: none;
            padding: 0;
            margin: 18px 0 0;
        }

        .contact-list li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            line-height: 1.6;
        }

        .contact-list strong {
            color: var(--apotek-text);
            display: block;
            margin-bottom: 4px;
        }

        .info-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .process-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .step {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(57, 208, 207, 0.12);
            border: 1px solid rgba(57, 208, 207, 0.2);
            color: var(--apotek-primary);
            font-weight: 800;
            margin-bottom: 14px;
        }

        .cta-section {
            padding: 40px 0 90px;
        }

        .cta-box {
            background: linear-gradient(135deg, rgba(57, 208, 207, 0.18), rgba(82, 214, 165, 0.1));
            border: 1px solid var(--apotek-border);
            border-radius: 28px;
            padding: 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
        }

        .cta-box h3 {
            font-size: clamp(1.6rem, 2vw, 2.35rem);
            margin-bottom: 8px;
        }

        .cta-box p {
            margin: 0;
            color: var(--apotek-muted);
        }

        .site-footer {
            border-top: 1px solid var(--apotek-border);
            background: #051719;
            padding: 28px 0 42px;
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

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            [data-aos] { opacity: 1 !important; transform: none !important; transition: none !important; }
        }

        @media (max-width: 900px) {
            .hero-grid,
            .about-grid,
            .contact-grid,
            .feature-grid,
            .info-grid,
            .process-grid {
                grid-template-columns: 1fr;
            }

            .branch-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
        }

        @media (max-width: 680px) {
            .site-header {
                background: rgba(5, 24, 27, 0.92);
            }

            .header-inner {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 12px;
                padding: 12px 0 14px;
            }

            .brand {
                flex: 1;
                min-width: 0;
                justify-content: flex-start;
                text-align: left;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-name {
                font-size: 1.05rem;
                white-space: nowrap;
            }

            .nav-toggle {
                display: inline-flex;
            }

            .nav {
                display: none;
                width: 100%;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 8px;
                animation: fadeSlide 0.22s ease;
            }

            .nav.is-open {
                display: grid;
            }

            @keyframes fadeSlide {
                from {
                    opacity: 0;
                    transform: translateY(-8px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .nav a {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 42px;
                padding: 10px 12px;
                border-radius: 12px;
                background: rgba(255, 255, 255, 0.02);
                border: 1px solid var(--apotek-border);
                font-size: 0.84rem;
                font-weight: 800;
                color: var(--apotek-text);
            }

            .nav a:hover,
            .nav a.active {
                background: rgba(57, 208, 207, 0.12);
                border-color: rgba(57, 208, 207, 0.34);
                color: #ffffff;
            }

            .nav-cta {
                grid-column: 1 / -1;
                width: 100%;
                padding: 14px 18px;
                font-size: 0.96rem;
                letter-spacing: 0.02em;
                color: #041d20 !important;
                font-weight: 900;
                background: linear-gradient(135deg, #26f0b2 0%, #4fe2d8 100%);
                box-shadow: 0 14px 26px rgba(31, 231, 165, 0.28);
                border: 1px solid rgba(255,255,255,0.18);
                text-shadow: 0 1px 0 rgba(255,255,255,0.2);
            }

            .nav-cta:hover {
                box-shadow: 0 18px 28px rgba(31, 231, 165, 0.36);
            }

            .about-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .page-about .about-grid {
                grid-template-columns: 1fr;
            }

            .page-about .hero-card {
                position: static;
                order: -1;
                width: 100%;
                padding: 20px;
            }

            .page-about .mini-card {
                padding: 16px 18px;
                margin-top: 12px;
            }

            .page-about .mini-card h3 {
                font-size: 1rem;
                margin-bottom: 8px;
            }

            .page-about .mini-card p {
                font-size: 0.88rem;
                line-height: 1.5;
            }

            .hero-card {
                order: 1;
            }

            .about-copy {
                order: 2;
            }

            .branch-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .branch-item {
                border-radius: 12px;
            }

            .branch-image {
                aspect-ratio: 16 / 9;
            }

            .branch-info {
                padding: 12px 13px;
            }

            .branch-name {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }

            .branch-address {
                font-size: 0.78rem;
            }

            .pill-list {
                gap: 8px;
            }

            .pill {
                flex: 1 1 calc(50% - 8px);
                min-width: 0;
                white-space: normal;
                text-align: center;
            }
        }

        /* Service Slideshow Styles */
        .service-slideshow {
            width: 100%;
            height: auto;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background: var(--apotek-card);
            border: 1px solid var(--apotek-border);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 32px var(--apotek-shadow);
        }

        .slide {
            display: none;
            width: 100%;
            height: 100%;
            animation: fadeIn 0.8s ease-in-out;
        }

        .slide.fade {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .slide-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dot.active {
            background: var(--apotek-primary);
            box-shadow: 0 0 12px rgba(57, 208, 207, 0.6);
            border-color: var(--apotek-primary);
        }

        .dot:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(57, 208, 207, 0.2);
            color: var(--apotek-primary);
            border: 1px solid var(--apotek-border);
            border-radius: 50%;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            user-select: none;
            z-index: 10;
        }

        .prev:hover, .next:hover {
            background: rgba(57, 208, 207, 0.4);
            transform: translateY(-50%) scale(1.1);
        }

        .prev {
            left: 15px;
        }

        .next {
            right: 15px;
        }

        @media (max-width: 768px) {
            .prev, .next {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .prev {
                left: 10px;
            }

            .next {
                right: 10px;
            }
        }

        @media (max-width: 480px) {
            .prev, .next {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }

            .dot {
                width: 10px;
                height: 10px;
            }

            .slide-dots {
                bottom: 15px;
                gap: 8px;
            }
        }

        /* Auth & Admin Styles */
        .auth-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 200px);
            padding: 40px 20px;
            background: radial-gradient(circle at center, rgba(57, 208, 207, 0.08), transparent 60%);
        }

        .auth-box {
            background: linear-gradient(135deg, rgba(15, 51, 56, 0.98), rgba(9, 29, 32, 0.98));
            border: 1px solid var(--apotek-border);
            border-radius: 24px;
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .auth-header img {
            width: 72px;
            height: 72px;
            display: block;
            margin: 0 auto 20px;
            filter: drop-shadow(0 4px 12px rgba(57, 208, 207, 0.3));
        }

        .auth-header h1 {
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, var(--apotek-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .auth-form {
            display: grid;
            gap: 20px;
        }

        .form-group {
            display: grid;
            gap: 10px;
        }

        .form-group label {
            font-weight: 700;
            color: var(--apotek-text);
            font-size: 0.95rem;
            letter-spacing: 0.01em;
        }

        .form-group input {
            padding: 13px 16px;
            border-radius: 14px;
            border: 1.5px solid var(--apotek-border);
            background: rgba(255, 255, 255, 0.05);
            color: var(--apotek-text);
            font-size: 0.97rem;
            transition: all 0.25s ease;
            font-family: inherit;
        }

        .form-group input::placeholder {
            color: rgba(139, 191, 189, 0.5);
        }

        .form-group input:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(57, 208, 207, 0.4);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--apotek-primary);
            background: rgba(57, 208, 207, 0.12);
            box-shadow: 0 0 0 4px rgba(57, 208, 207, 0.15);
        }

        .form-group input:-webkit-autofill,
        .form-group input:-webkit-autofill:hover,
        .form-group input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0 30px rgba(255, 255, 255, 0.05) inset !important;
            -webkit-text-fill-color: var(--apotek-text) !important;
        }

        .form-group.checkbox {
            flex-direction: row;
            gap: 0;
            align-items: center;
            margin-top: 4px;
        }

        .form-group.checkbox label {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            cursor: pointer;
            color: var(--apotek-muted);
        }

        .form-group.checkbox input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--apotek-primary);
        }

        .alert {
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 0.92rem;
            line-height: 1.6;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-error {
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.4);
            color: #fecaca;
        }

        .alert ul {
            margin: 0;
            padding-left: 18px;
        }

        .alert li {
            margin: 6px 0;
        }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid rgba(117, 255, 247, 0.1);
        }

        .auth-footer a {
            color: var(--apotek-primary);
            font-weight: 600;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .auth-footer a:hover {
            color: var(--apotek-accent);
            transform: translateX(-4px);
        }

        /* Admin Dashboard */
        .admin-container {
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 32px;
            padding: 24px;
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 22px;
            flex-wrap: wrap;
        }

        .admin-header-content h1 {
            font-size: 2rem;
            margin-bottom: 4px;
        }

        .admin-header-content p {
            color: var(--apotek-muted);
            margin: 0;
        }

        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .admin-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 22px;
            padding: 24px;
            text-align: center;
        }

        .admin-card h3 {
            margin-bottom: 12px;
            font-size: 1rem;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 900;
            color: var(--apotek-primary);
            margin: 0;
        }

        .admin-section {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--apotek-border);
            border-radius: 22px;
            padding: 24px;
            margin-bottom: 20px;
        }

        .admin-section h2 {
            margin-top: 0;
            margin-bottom: 18px;
            font-size: 1.6rem;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            color: var(--apotek-muted);
            font-size: 0.92rem;
        }

        .admin-table thead {
            background: rgba(57, 208, 207, 0.08);
            border-bottom: 1px solid var(--apotek-border);
        }

        .admin-table th {
            padding: 12px;
            text-align: left;
            font-weight: 700;
            color: var(--apotek-text);
        }

        .admin-table td {
            padding: 12px;
            border-bottom: 1px solid rgba(117, 255, 247, 0.1);
        }

        .admin-table tbody tr:hover {
            background: rgba(57, 208, 207, 0.04);
        }

        @media (max-width: 680px) {
            .auth-box {
                padding: 28px;
            }

            .auth-header h1 {
                font-size: 1.5rem;
            }

            .admin-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .admin-table {
                font-size: 0.85rem;
            }

            .admin-table th,
            .admin-table td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            @if(Auth::check())
                <a href="{{ route('admin.dashboard') }}" class="brand" aria-label="Admin Dashboard">
                    <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo Apotek Alfa Group" class="brand-logo">
                    <span class="brand-name">Dashboard Admin</span>
                </a>
            @else
                <a href="{{ route('auth.login.form') }}" class="brand" aria-label="Admin Login">
                    <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo Apotek Alfa Group" class="brand-logo">
                    <span class="brand-name">Apotek Alfa Group</span>
                </a>
            @endif

            <button class="nav-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span class="nav-toggle-bar"></span>
            </button>

            <nav class="nav" aria-label="Main navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
                <a href="{{ route('partners') }}" class="{{ request()->routeIs('partners') ? 'active' : '' }}">Mitra Kami</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Hubungi Kami</a>

                @if(Auth::check())
                    <a href="{{ route('admin.dashboard') }}" class="nav-cta">Kembali ke Dashboard</a>
                @endif
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="container footer-inner">
            <div class="brand">
                <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo Apotek Alfa Group" class="brand-logo" style="width: 44px; height: 44px;">
                <span class="brand-name" style="font-size: 1.2rem;">Apotek Alfa Group</span>
            </div>
            <div class="footer-meta">© {{ date('Y') }} Apotek Alfa Group · Selalu siap melayani kesehatan Anda.</div>
        </div>
    </footer>

        </svg>
    </a>
    <a href="{{ route('contact') }}" class="floating-support" aria-label="Hubungi Customer Service">
        <svg viewBox="0 0 24 24" aria-hidden="true" style="width: 30px; height: 30px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; display: block;">
            <path d="M4 13a8 8 0 0 1 16 0"/>
            <path d="M4 13v3a2 2 0 0 0 2 2h1v-6H6a2 2 0 0 0-2 1Z"/>
            <path d="M20 13v3a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 1Z"/>
            <path d="M17 18c-.5 1.2-1.7 2-3 2h-1"/>
        </svg>
    </a>
        </svg>
    </a>

    <script>
        const aosScript = document.createElement('script');
        aosScript.src = 'https://unpkg.com/aos@2.3.4/dist/aos.js';
        aosScript.onload = function () {
            AOS.init({
                duration: 700,
                easing: 'ease-out-cubic',
                once: true,
                offset: 80,
            });
        };
        document.body.appendChild(aosScript);

        const navToggle = document.querySelector('.nav-toggle');
        const nav = document.querySelector('.nav');

        if (navToggle && nav) {
            navToggle.addEventListener('click', function () {
                const isOpen = nav.classList.toggle('is-open');
                navToggle.classList.toggle('is-active', isOpen);
                navToggle.setAttribute('aria-expanded', String(isOpen));
            });

            nav.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 680) {
                        nav.classList.remove('is-open');
                        navToggle.classList.remove('is-active');
                        navToggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        }
    </script>
</body>
</html>
