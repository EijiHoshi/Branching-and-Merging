<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .profile-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            padding: 100px 0;
            color: white;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.5);
        }
        .stat-card {
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-user-circle me-2"></i>Profil
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="show.php">
                            <i class="fas fa-store me-1"></i>Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./backend/logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Header -->
    <header class="profile-header text-center">
        <div class="container">
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['name']) ?>&background=random" 
                 alt="Profile" 
                 class="profile-img mb-4">
            <h1 class="display-4 fw-bold"><?= htmlspecialchars($_SESSION['name']) ?></h1>
            <p class="lead">
                <i class="fas fa-user-tag me-2"></i><?= htmlspecialchars($_SESSION['role']) ?>
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Activity Stats -->
            <div class="col-md-4">
                <div class="card shadow-sm stat-card">
                    <div class="card-body text-center p-4">
                        <div class="display-4 text-primary mb-3">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="card-title">Pesanan</h3>
                        <p class="display-6 text-muted">0</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm stat-card">
                    <div class="card-body text-center p-4">
                        <div class="display-4 text-success mb-3">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="card-title">Wishlist</h3>
                        <p class="display-6 text-muted">0</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm stat-card">
                    <div class="card-body text-center p-4">
                        <div class="display-4 text-warning mb-3">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="card-title">Reviews</h3>
                        <p class="display-6 text-muted">0</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card shadow-sm mt-5">
            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-clock me-2"></i>Aktivitas Terbaru
                </h4>
            </div>
            <div class="card-body p-4">
                <div class="text-center text-muted py-5">
                    <i class="fas fa-history fa-3x mb-3"></i>
                    <p>Belum ada aktivitas terbaru</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">
                &copy; <?= date('Y') ?> User Profile. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

