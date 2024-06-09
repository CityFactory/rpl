<?php
	session_start();
	require("../koneksi.php");
	
	//koding memanggil data inputan
	$user_input = $_POST["input_user"];
	$pass_input = $_POST["input_pass"];
	
	//koding memanggil data dari database
	$sql		= "SELECT * FROM admin WHERE username='$user_input' && password='$pass_input'";
	$query		= mysqli_query($db_con, $sql);
	$dt			= mysqli_fetch_array($query);
	$db_id = $dt["id_pengguna"];
	$nama_pengguna = $dt["nama_lengkap"];
	$db_user = $dt["username"];
	$db_pass = $dt["password"]; 
	$email = $dt["email"];
	
	if($user_input==$db_user && $pass_input==$db_pass){
		$_SESSION['sesi_id'] = $db_id;
		header ('location:data_penjual.php');
	}else{
		header ('location:index.php');
	}
?>