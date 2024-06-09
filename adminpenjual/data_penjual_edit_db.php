<?php
require('../koneksi.php');

// Mengambil ID produk dari URL
if (isset($_GET['id'])) {
  $id_produk = $_GET['id'];
} else {
  // Jika ID produk tidak ditemukan, kembalikan ke halaman data_penjual.php
  header("Location: data_penjual.php");
  exit();
}

// Memeriksa apakah data produk dengan ID yang diberikan ada di database
$cek_data = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$query_cek_data = mysqli_query($db_con, $cek_data);

if (mysqli_num_rows($query_cek_data) > 0) {
  $data_produk = mysqli_fetch_assoc($query_cek_data);

  // Menangani aksi form saat tombol "Submit" diklik
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_nama_produk = $_POST["nama_produk"];
    $input_harga_produk = $_POST["harga_produk"];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] == 0) {
      $nama_file_baru = $_FILES['foto_produk']['name'];
      $ukuran_file = $_FILES['foto_produk']['size'];
      $tipe_file = $_FILES['foto_produk']['type'];
      $lokasi_ambil_file = $_FILES['foto_produk']['tmp_name'];
      $lokasi_simpan_file = "../images/" . $nama_file_baru;

      move_uploaded_file($lokasi_ambil_file, $lokasi_simpan_file);

      // Update data produk termasuk gambar
      $update_data = "UPDATE produk SET nama_produk = '$input_nama_produk', harga = '$input_harga_produk', gambar = '$nama_file_baru' WHERE id_produk = '$id_produk'";
    } else {
      // Update data produk tanpa mengubah gambar
      $update_data = "UPDATE produk SET nama_produk = '$input_nama_produk', harga = '$input_harga_produk' WHERE id_produk = '$id_produk'";
    }

    $query_update_data = mysqli_query($db_con, $update_data);

    if ($query_update_data) {
      // Redirect ke halaman data_penjual.php setelah berhasil mengupdate data
      header("Location: data_penjual.php");
      exit();
    } else {
      // Tampilkan pesan error jika terjadi masalah saat mengupdate data
      echo "Error: " . mysqli_error($db_con);
    }
  }
} else {
  // Jika data produk dengan ID yang diberikan tidak ditemukan di database, kembalikan ke halaman data_penjual.php
  header("Location: data_penjual.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Opsi konfigurasi lainnya -->
</head>

<body>
  <!-- Bagian HTML tampilan -->

  <form role="form" action="data_penjual_edit_db.php?id=<?php echo $id_produk; ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk" value="<?php echo $data_produk['nama_produk']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Harga</label>
      <input type="number" name="harga_produk" class="form-control" id="exampleInputPassword1" placeholder="Harga" value="<?php echo $data_produk['harga']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Unggah Foto</label>
      <input type="file" name="foto_produk">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <!-- Skrip JavaScript dan library lainnya -->
</body>

</html>
