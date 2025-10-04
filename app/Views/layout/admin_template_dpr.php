<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Admin Panel DPR'); ?></title>
    <style>
        :root {
            --primary-color: #0d6efd;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
            --text-dark: #343a40;
            --text-light: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --danger-color: #dc3545;
            --success-color: #198754;
        }
        body { font-family: sans-serif; margin: 0; background-color: var(--light-gray); color: var(--text-dark); }
        .header { background: var(--primary-color); color: var(--text-light); padding: 1rem 2rem; box-shadow: var(--shadow); }
        .header h2 { margin: 0; }
        .menu { background: var(--text-light); padding: 0.75rem 2rem; border-bottom: 1px solid var(--border-color); }
        .menu a { margin-right: 20px; text-decoration: none; color: var(--primary-color); font-weight: 500; }
        .menu a:hover { color: var(--text-dark); }
        .content { padding: 2rem; }
        .card { background-color: var(--text-light); padding: 25px; border-radius: 8px; border: 1px solid var(--border-color); box-shadow: var(--shadow); }
        .footer { background: var(--text-dark); color: var(--text-light); text-align: center; padding: 1rem; margin-top: 2rem; font-size: 0.9rem; }
        .footer p { margin: 0; }
        /* Style tambahan untuk form & notifikasi */
        .alert { padding: 1rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .375rem; }
        .alert-success { color: #0f5132; background-color: #d1e7dd; border-color: #badbcc; }
        .alert-error { color: #842029; background-color: #f8d7da; border-color: #f5c2c7; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: .5rem; font-weight: 500; }
        .form-group input, .form-group select { width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ced4da; box-sizing: border-box;}
        .btn { display: inline-block; padding: 10px 15px; color: white; text-decoration: none; border-radius: 6px; font-weight: 500; border: none; cursor: pointer; background-color: var(--primary-color);}
        .btn-add { background-color: var(--success-color); }
        .btn-delete { background-color: var(--danger-color); }
    </style>
</head>
<body>

    <header class="header">
        <h2>Panel Admin</h2>
    </header>

    <nav class="menu">
        <a href="#">Dashboard</a>
        <a href="<?= site_url('admin/anggota') ?>">Kelola Anggota</a>
        <a href="<?= site_url('admin/komponengaji') ?>">Kelola Komponen Gaji</a>
        <a href="<?= site_url('admin/penggajian') ?>">Kelola Penggajian</a>
        <a href="<?= site_url('logout') ?>">Logout</a>
    </nav>

    <main class="content">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <p>&copy; <?= date('Y') ?> Sistem Penggajian DPR</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>