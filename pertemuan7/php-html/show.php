<?php
require './config/db.php';

$products = mysqli_query($db_connect, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .product-card {
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-image {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-store me-2"></i>Katalog Produk
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">
                            <i class="fas fa-plus-circle me-1"></i>Tambah Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-4">
                    <i class="fas fa-list me-2"></i>Daftar Produk
                </h2>
            </div>
        </div>

        <div class="row g-4">
            <?php while($product = mysqli_fetch_array($products)) { ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm product-card">
                    <img src="<?= $product['image'] ?>" 
                         class="card-img-top product-image" 
                         alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                        <p class="card-text text-muted">
                            Rp <?= number_format($product['price'], 0, ',', '.') ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="edit.php?id=<?= $product['id'] ?>" 
                               class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <a href="./backend/delete.php?id=<?= $product['id'] ?>" 
                               class="btn btn-danger"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash-alt me-1"></i>Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php if(mysqli_num_rows($products) == 0) { ?>
        <div class="text-center py-5">
            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">Belum ada produk</h4>
            <p class="text-muted">Silakan tambahkan produk baru</p>
            <a href="create.php" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i>Tambah Produk
            </a>
        </div>
        <?php } ?>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto border-top">
        <div class="container text-center">
            <p class="text-muted mb-0">
                &copy; <?= date('Y') ?> Katalog Produk. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
