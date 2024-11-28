<?php

require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    $name = mysqli_real_escape_string($db_connect, $_POST['name']);
    $price = mysqli_real_escape_string($db_connect, $_POST['price']);
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/upload';
    
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $randomFilename = time() . '-' . md5(rand()) . '-' . $image;
    $uploadPath = $uploadDir . '/' . $randomFilename;

    $upload = move_uploaded_file($tempImage, $uploadPath);

    if ($upload) {
        $query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '/upload/$randomFilename')";
        mysqli_query($db_connect, $query);
        
        header("Location: ../success.php?name=" . urlencode($name));
        exit();
    } else {
        $error = "Gagal mengunggah produk. Coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Produk Baru</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" id="price" name="price" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Simpan Produk
                                </button>
                                <a href="../index.php" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
