<?php
require './config/db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data produk sebelum dihapus
    $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .delete-icon {
            width: 90px;
            height: 90px;
            background: #dc3545;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }
        .btn-action {
            transition: all 0.3s;
        }
        .btn-action:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-trash-alt me-2"></i>Hapus Produk
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="show.php">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center p-5">
                        <?php if(isset($product)): ?>
                            <div class="delete-icon mb-4">
                                <i class="fas fa-exclamation-triangle fa-3x text-white"></i>
                            </div>
                            
                            <h3 class="mb-4">Konfirmasi Penghapusan</h3>
                            
                            <p class="text-muted mb-4">
                                Apakah Anda yakin ingin menghapus produk:<br>
                                <strong><?= htmlspecialchars($product['name']) ?></strong>?<br>
                                Tindakan ini tidak dapat dibatalkan.
                            </p>

                            <div class="d-grid gap-2">
                                <form action="./backend/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-lg btn-action w-100 mb-2">
                                        <i class="fas fa-trash-alt me-2"></i>Ya, Hapus Produk
                                    </button>
                                </form>
                                <a href="show.php" class="btn btn-secondary btn-lg btn-action">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <i class="fas fa-exclamation-circle text-warning fa-3x mb-3"></i>
                                <h5>Produk Tidak Ditemukan</h5>
                                <p class="text-muted">Produk yang ingin Anda hapus tidak tersedia.</p>
                                <a href="show.php" class="btn btn-primary btn-lg btn-action">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Produk
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto border-top">
        <div class="container text-center">
            <p class="text-muted mb-0">
                &copy; <?= date('Y') ?> Product Management System. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
