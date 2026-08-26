<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Login - Jeikinan Cake') ?></title>
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-primary: #fefff7;
            --card-bg: #ffffff;
            --text-dark: #2E3C18;
            --text-body: #3d2c1e;
            --text-muted: #6e7860;
            --green-primary: #314424;
            --green-hover: #202d18;
            --green-light: #edf2ea;
            --green-border: #a3b899;
            --red-accent: #d32f2f;
            --red-light: #ffebee;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text-body);
        }

        .login-card {
            background: var(--card-bg);
            border: 2px solid var(--green-border);
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            padding: 40px 32px;
            box-shadow: 0 10px 30px rgba(49, 68, 36, 0.08);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-logo {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: var(--green-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #ffffff;
            font-size: 32px;
            box-shadow: 0 6px 16px rgba(49, 68, 36, 0.25);
        }

        .brand-title {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .brand-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 14px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .alert-danger {
            background: var(--red-light);
            border: 1px solid rgba(211, 47, 47, 0.4);
            color: var(--red-accent);
        }

        .alert-success {
            background: var(--green-light);
            border: 1px solid var(--green-border);
            color: var(--green-primary);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 14px;
            color: var(--green-primary);
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px 14px 44px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: var(--text-body);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--green-primary);
            box-shadow: 0 0 0 3px rgba(49, 68, 36, 0.15);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 15px;
            padding: 4px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--green-primary);
            border: none;
            border-radius: 10px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 18px rgba(49, 68, 36, 0.2);
        }

        .btn-submit:hover {
            background: var(--green-hover);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-header">
            <div class="brand-logo">
                <i class="fa-solid fa-cake-candles"></i>
            </div>
            <h1 class="brand-title">Jeikinan Admin</h1>
            <p class="brand-subtitle">Masuk untuk mengelola CMS website</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-user input-icon"></i>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" value="<?= old('username') ?>" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility()">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <span>Masuk Ke Admin</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
