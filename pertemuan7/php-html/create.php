<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-form {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #198754;
        }
        .preview-image {
            max-height: 200px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-plus-circle me-2"></i>Tambah Produk
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="show.php">
                            <i class="fas fa-list me-1"></i>Lihat Data Produk
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card product-form bg-white">
                    <div class="card-header bg-white p-4 border-bottom">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-box me-2 text-success"></i>Detail Produk Baru
                        </h4>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="./backend/create.php" method="post" enctype="multipart/form-data">
                            <!-- Nama Produk -->
                            <div class="mb-4">
                                <label for="name" class="form-label">
                                    <i class="fas fa-tag me-2 text-success"></i>Nama Produk
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="name" 
                                       name="name" 
                                       placeholder="Masukkan nama produk"
                                       required>
                            </div>

                            <!-- Harga Produk -->
                            <div class="mb-4">
                                <label for="price" class="form-label">
                                    <i class="fas fa-money-bill me-2 text-success"></i>Harga Produk
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" 
                                           class="form-control" 
                                           id="price" 
                                           name="price" 
                                           placeholder="Masukkan harga produk"
                                           required>
                                </div>
                            </div>

                            <!-- Gambar Produk -->
                            <div class="mb-4">
                                <label for="image" class="form-label">
                                    <i class="fas fa-image me-2 text-success"></i>Gambar Produk
                                </label>
                                <input type="file" 
                                       class="form-control" 
                                       id="image" 
                                       name="image"
                                       accept="image/*"
                                       onchange="previewImage(this)"
                                       required>
                                <div id="imagePreview" class="mt-3 text-center d-none">
                                    <img src="" alt="Preview" class="preview-image rounded">
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-save me-2"></i>Simpan Produk
                                </button>
                                <a href="show.php" class="btn btn-light btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Preview Image Script -->
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const previewImg = preview.querySelector('img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
