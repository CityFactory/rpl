<?php
// Konfigurasi koneksi ke database
$host = "localhost"; // Ganti dengan host Anda
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$database = "babeyagun"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form signup
$username = $_POST['input_user'];
$password = $_POST['input_pass'];
$nama_lengkap = $_POST['input_nama'];
$email = $_POST['input_email'];

// Membuat query untuk memasukkan data ke tabel user
$sql = "INSERT INTO user (username, password, nama_lengkap, email) VALUES ('$username', '$password', '$nama_lengkap', '$email')";

if ($conn->query($sql) === TRUE) {
    // Jika data berhasil dimasukkan, tampilkan pesan sukses
    echo "Pendaftaran berhasil! Silakan <a href='index.php'>login</a> dengan akun Anda.";
} else {
    // Jika terjadi kesalahan, tampilkan pesan error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
