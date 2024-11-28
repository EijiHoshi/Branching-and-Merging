<?php
require './config/db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
    $product = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .preview-image {
            max-height: 200px;
            object-fit: contain;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-edit me-2"></i>Edit Produk
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

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-box me-2 text-primary"></i>
                            Edit Data Produk
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if(isset($product)): ?>
                            <form action="./backend/edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                
                                <!-- Nama Produk -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-tag me-1 text-primary"></i>Nama Produk
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="name" 
                                           name="name" 
                                           value="<?= htmlspecialchars($product['name']) ?>" 
                                           required>
                                </div>

                                <!-- Harga -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">
                                        <i class="fas fa-money-bill me-1 text-primary"></i>Harga
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" 
                                               class="form-control" 
                                               id="price" 
                                               name="price" 
                                               value="<?= $product['price'] ?>" 
                                               required>
                                    </div>
                                </div>

                                <!-- Gambar -->
                                <div class="mb-4">
                                    <label for="image" class="form-label">
                                        <i class="fas fa-image me-1 text-primary"></i>Gambar Produk
                                    </label>
                                    <div class="mb-3">
                                        <img src="<?= $product['image'] ?>" 
                                             alt="Current Image" 
                                             class="preview-image border rounded">
                                    </div>
                                    <input type="file" 
                                           class="form-control" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                </div>

                                <!-- Buttons -->
                                <div class="d-grid gap-2">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i>Simpan Perubahan
                                    </button>
                                    <a href="show.php" class="btn btn-secondary">
                                        <i class="fas fa-times me-1"></i>Batal
                                    </a>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                                <h5>Produk tidak ditemukan</h5>
                                <p class="text-muted">Produk yang Anda cari tidak tersedia</p>
                                <a href="show.php" class="btn btn-primary">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
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
