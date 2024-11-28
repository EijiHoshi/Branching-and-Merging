<?php
session_start();
require './../config/db.php';

// Ubah untuk menerima request AJAX
header('Content-Type: application/json');

// Cek method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method tidak diizinkan']);
    exit;
}

$name = mysqli_real_escape_string($db_connect, $_POST['name']);
$email = mysqli_real_escape_string($db_connect, $_POST['email']);
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if($confirm !== $password) {
    echo json_encode(['success' => false, 'message' => 'Password tidak sesuai']);
    exit;
}

// Cek email sudah digunakan atau belum
$usedEmail = mysqli_query($db_connect, "SELECT email FROM users WHERE email = '$email'");
if(mysqli_num_rows($usedEmail) > 0) {
    echo json_encode(['success' => false, 'message' => 'Email sudah digunakan']);
    exit;
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$created_at = date('Y-m-d H:i:s');

// Insert data user
$users = mysqli_query($db_connect, 
    "INSERT INTO users (name, email, password, created_at) VALUES ('$name', '$email', '$hashedPassword', '$created_at')"
);

if($users) {
    $_SESSION['message'] = 'Registrasi berhasil! Silakan login.';
    echo json_encode(['success' => true, 'message' => 'Registrasi berhasil! Silakan login.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal mendaftar: ' . mysqli_error($db_connect)]);
}
?>