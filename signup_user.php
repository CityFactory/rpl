<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <!-- Tambahkan CSS sesuai kebutuhan -->
  <style>
    /* CSS styling untuk halaman sign up */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group .error-message {
      color: red;
      font-size: 14px;
    }

    .form-group .success-message {
      color: green;
      font-size: 14px;
    }

    .form-group button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group .login-link {
      display: block;
      margin-top: 10px;
      text-align: center;
      color: #777;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Sign Up</h2>
    <form action="proses_signup_user.php" method="POST">
      <div class="form-group">
        <label for="input_user">Username</label>
        <input type="text" name="input_user" id="input_user" required>
      </div>
      <div class="form-group">
        <label for="input_pass">Password</label>
        <input type="password" name="input_pass" id="input_pass" required>
      </div>
      <div class="form-group">
        <label for="input_nama">Nama Lengkap</label>
        <input type="text" name="input_nama" id="input_nama" required>
      </div>
      <div class="form-group">
        <label for="input_email">Email</label>
        <input type="email" name="input_email" id="input_email" required>
      </div>
      <div class="form-group">
        <button type="submit">Sign Up</button>
      </div>
      <a href="index.php" class="login-link">Sudah memiliki akun? Login</a>
    </form>
  </div>
</body>

</html>
