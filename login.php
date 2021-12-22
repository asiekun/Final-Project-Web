<?php 
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
include "functions.php";

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $result = mysqli_query($conn, "SELECT * FROM registrasi WHERE username = '$username'");

 // cek username
    if (mysqli_num_rows($result)=== 1) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
          // set session
          $_SESSION["login"] = true;
          header("Location: index.php");
          exit;
        }
    }
    $error = true;
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-center container" style="width:350px; margin-top: 25px; background-color: #7eebd8; ">

    <main class="form-signin">
        <form action="" method="POST">
            <img class="mb-2" src="assets/img/login-logo.png" alt="login" width="300" height="300">
            <h1 class="h3 mt-3 mb-3 fw-normal" style="color: #008037; "><b>SELAMAT DATANG MIMIN</b></h1>
            <?php if (isset($error)):?>
            <center>
                <p style="color: red; font-style:italic;">Username atau password salah</p>
            </center>
            <?php endif; ?>
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <label>Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <label>Password</label>
            </div>
            <button class="w-50 mt-3 btn btn-lg btn-success" name="login" type="submit">Masuk</button>
            <div class="text-center p-3">
                Belum punya akun? <a href="registrasi.php">Registrasi disini</a>
            </div>
        </form>
    </main>

</body>

</html>