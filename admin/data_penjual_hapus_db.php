<?php
	require('../koneksi.php');
	$id	= $_GET["id"];
	$hapus_data 		= "DELETE FROM produk WHERE id_produk='$id'";
	$query  			= mysqli_query($db_con, $hapus_data);
	echo "<meta http-equiv='refresh' content='0;url=data_penjual.php'>";
?>