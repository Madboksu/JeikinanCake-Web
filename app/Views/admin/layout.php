<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'CMS Kelola Website - Jeikinan Cake') ?></title>
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-primary: #fefff7;
            --bg-card: #ffffff;
            --text-dark: #2E3C18;
            --text-body: #3d2c1e;
            --text-muted: #6e7860;
            --border-color: #e2e8f0;
            --green-primary: #314424;
            --green-hover: #202d18;
            --green-light: #edf2ea;
            --green-border: #a3b899;
            --brown-accent: #4a2c1d;
            --red-accent: #d32f2f;
            --red-light: #ffebee;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-body);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar */
        .cms-navbar {
            background-color: #ffffff;
            border-bottom: 2px solid var(--green-border);
            padding: 14px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 15px rgba(49, 68, 36, 0.08);
        }

        .cms-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .cms-brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--green-primary);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .cms-brand-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: 0.5px;
        }

        .cms-nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            list-style: none;
        }

        .cms-nav-links a {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 15px;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cms-nav-links a:hover {
            color: var(--green-primary);
            background: var(--green-light);
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--brown-accent);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-logout {
            padding: 8px 16px;
            background-color: var(--red-light);
            border: 1px solid rgba(211, 47, 47, 0.3);
            color: var(--red-accent);
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover {
            background-color: var(--red-accent);
            color: #ffffff;
        }

        /* Container */
        .container {
            max-width: 1100px;
            width: 100%;
            margin: 36px auto;
            padding: 0 20px;
            flex: 1;
        }

        /* Card Section */
        .card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 32px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
        }

        .card-header {
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--green-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-title i {
            color: var(--green-primary);
        }

        /* Flash Alerts */
        .alert {
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background-color: var(--green-light);
            border: 1px solid var(--green-border);
            color: var(--green-primary);
        }

        .alert-danger {
            background-color: var(--red-light);
            border: 1px solid rgba(211, 47, 47, 0.4);
            color: #c62828;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px 16px;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: var(--text-body);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--green-primary);
            box-shadow: 0 0 0 3px rgba(49, 68, 36, 0.15);
        }

        input[type="file"] {
            padding: 10px;
            background: var(--bg-primary);
            border: 1px dashed var(--green-border);
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
        }

        /* Buttons */
        .btn {
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-green {
            background-color: var(--green-primary);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(49, 68, 36, 0.2);
        }

        .btn-green:hover {
            background-color: var(--green-hover);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: var(--text-dark);
        }

        .btn-secondary:hover {
            background-color: #cbd5e1;
        }

        .btn-danger {
            background-color: var(--red-light);
            color: var(--red-accent);
            border: 1px solid var(--red-accent);
        }

        .btn-danger:hover {
            background-color: var(--red-accent);
            color: #ffffff;
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 8px;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
        }

        th {
            background-color: var(--green-light);
            color: var(--text-dark);
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .img-thumb {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid var(--border-color);
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-green {
            background: var(--green-light);
            color: var(--green-primary);
            border: 1px solid var(--green-border);
        }

        .badge-gray {
            background: #f1f5f9;
            color: #64748b;
            border: 1px solid #cbd5e1;
        }

        .badge-brown {
            background: #efebe9;
            color: var(--brown-accent);
            border: 1px solid #d7ccc8;
        }

        /* Footer */
        .cms-footer {
            text-align: center;
            padding: 24px;
            color: var(--text-muted);
            font-size: 13px;
            border-top: 1px solid var(--border-color);
            background-color: #ffffff;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .cms-navbar {
                flex-direction: column;
                gap: 12px;
                padding: 14px 20px;
            }
            .cms-nav-links {
                gap: 12px;
            }
        }
    </style>
</head>
<body>

    <!-- Top Navbar Header -->
    <nav class="cms-navbar">
        <a href="<?= base_url('admin/dashboard') ?>" class="cms-brand">
            <div class="cms-brand-icon">
                <i class="fa-solid fa-cake-candles"></i>
            </div>
            <span class="cms-brand-title">Jeikinan CMS</span>
        </a>

        <ul class="cms-nav-links">
            <li>
                <a href="#store-section">
                    <i class="fa-solid fa-sliders"></i> Teks & Landing Page
                </a>
            </li>
            <li>
                <a href="#testimonials-section">
                    <i class="fa-solid fa-comments"></i> Kelola Testimoni
                </a>
            </li>
            <li>
                <a href="#products-section">
                    <i class="fa-solid fa-utensils"></i> Kelola Produk
                </a>
            </li>
        </ul>

        <div class="user-section">
            <span class="user-name">
                <i class="fa-solid fa-user-circle"></i>
                <?= esc(session()->get('admin_username') ?? 'Admin') ?>
            </span>
            <a href="<?= base_url('admin/logout') ?>" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>

    <footer class="cms-footer">
        &copy; <?= date('Y') ?> Jeikinan Cake CMS Admin Panel. All Rights Reserved.
    </footer>

    <script>
        // Prevent infinite image error loop and generate clean local SVG fallback
        function handleImgError(el, label = 'No Image') {
            el.onerror = null;
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><rect width="100%" height="100%" fill="#edf2ea"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#314424" font-size="12" font-family="sans-serif">${label}</text></svg>`;
            el.src = 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
        }

        // Hapus hash fragment (#...) dari address bar browser jika ada
        if (window.location.hash) {
            history.replaceState(null, null, window.location.pathname + window.location.search);
        }
    </script>
</body>
</html>
