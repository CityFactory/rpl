<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kode untuk memproses data pendaftaran
    session_start();
    require("../koneksi.php");

    // Koding memanggil data inputan
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];

    // Kode untuk menyimpan data pengguna ke dalam tabel
    $sql = "INSERT INTO admin (username, password, nama_lengkap, email) VALUES ('$username', '$password', '$nama_lengkap', '$email')";
    $result = mysqli_query($db_con, $sql);

    if ($result) {
        $_SESSION['success_message'] = "Pendaftaran berhasil. Silakan login.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>BaBeYaGun | Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- external css -->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- Custom background style -->
    <style>
        body.login-img3-body {
            background: linear-gradient(to bottom right, #4e9fe6, #8a67c1);
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
        Theme Name: Admin BaBeYaGun
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

    <div class="container">

        <form action="" method="POST" class="login-form">
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input class="form-control" type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign Up</button>
                <p class="text-right">Already have an account? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
