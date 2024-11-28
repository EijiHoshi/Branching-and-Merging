<?php
$productName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Produk';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukses - Produk Berhasil Ditambahkan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .success-animation {
            animation: fadeInUp 0.5s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }

        .btn-action {
            transition: transform 0.2s;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-light min-vh-100 d-flex flex-column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-check-circle me-2"></i>Status Produk
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container flex-grow-1">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8 col-lg-6 py-5">
                <div class="card shadow-sm success-animation">
                    <div class="card-body text-center p-5">
                        <div class="success-icon mb-4">
                            <i class="fas fa-check fa-3x text-white"></i>
                        </div>
                        
                        <h2 class="card-title mb-3">
                            Berhasil!
                        </h2>
                        
                        <p class="card-text text-muted mb-4">
                            Produk "<strong><?= $productName ?></strong>" telah berhasil ditambahkan ke database.
                        </p>

                        <div class="d-grid gap-3">
                            <a href="show.php" class="btn btn-primary btn-lg btn-action">
                                <i class="fas fa-list me-2"></i>Lihat Semua Produk
                            </a>
                            <a href="create.php" class="btn btn-success btn-lg btn-action">
                                <i class="fas fa-plus me-2"></i>Tambah Produk Lain
                            </a>
                            <a href="admin.php" class="btn btn-secondary btn-lg btn-action">
                                <i class="fas fa-home me-2"></i>Kembali ke Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 border-top">
        <div class="container text-center">
            <p class="text-muted mb-0">
                &copy; <?= date('Y') ?> Product Management System. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Auto Redirect -->
    <script>
        // Redirect after 5 seconds
        setTimeout(function() {
            window.location.href = 'show.php';
        }, 5000);
    </script>
</body>
</html>
