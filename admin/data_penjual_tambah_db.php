<?php
require('../koneksi.php');

$input_nama_produk = $_POST["nama_produk"];
$input_harga_produk = $_POST["harga_produk"];

$nama_file_baru = $_FILES['foto_produk']['name'];
$ukuran_file = $_FILES['foto_produk']['size'];
$tipe_file = $_FILES['foto_produk']['type'];
$lokasi_ambil_file = $_FILES['foto_produk']['tmp_name'];
$lokasi_simpan_file = "../images/" . $nama_file_baru;

move_uploaded_file($lokasi_ambil_file, $lokasi_simpan_file);

// Ubah struktur tabel untuk menambahkan AUTO_INCREMENT pada kolom ID
$ubah_struktur = "ALTER TABLE produk MODIFY COLUMN id INT AUTO_INCREMENT PRIMARY KEY";
mysqli_query($db_con, $ubah_struktur);

$tambah_data = "INSERT INTO produk (nama_produk, harga, gambar) VALUES ('$input_nama_produk','$input_harga_produk', '$nama_file_baru')";
$query = mysqli_query($db_con, $tambah_data);

if ($query) {
  // Redirect ke halaman data_penjual.php setelah berhasil menambahkan data
  header("Location: data_penjual.php");
  exit();
} else {
  // Tampilkan pesan error jika terjadi masalah saat menambahkan data
  echo "Error: " . mysqli_error($db_con);
}
?>
