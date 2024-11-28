<?php 
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .dashboard-card {
            transition: transform 0.2s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shield-alt me-2"></i>Admin Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            <?= htmlspecialchars($_SESSION['name']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="./backend/logout.php">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h2 class="mb-3">Selamat Datang di Panel Admin</h2>
                <p class="text-muted">Kelola produk dan data Anda dengan mudah melalui dashboard ini</p>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            <!-- Lihat Data Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow dashboard-card">
                    <div class="card-body text-center p-4">
                        <div class="display-4 text-primary mb-3">
                            <i class="fas fa-database"></i>
                        </div>
                        <h4 class="card-title mb-3">Data Produk</h4>
                        <p class="card-text text-muted mb-4">
                            Lihat dan kelola semua data produk yang tersedia dalam sistem
                        </p>
                        <a href="show.php" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-eye me-2"></i>Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tambah Produk Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow dashboard-card">
                    <div class="card-body text-center p-4">
                        <div class="display-4 text-success mb-3">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <h4 class="card-title mb-3">Tambah Produk</h4>
                        <p class="card-text text-muted mb-4">
                            Tambahkan produk baru ke dalam sistem database
                        </p>
                        <a href="create.php" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-plus me-2"></i>Tambah Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container text-center">
            <p class="text-muted mb-0">
                &copy; <?= date('Y') ?> Admin Dashboard. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
