<?php 
include "functions.php";

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
            </script>
        ";
    }else{
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-center container" style="width:350px; margin-top: 25px; background-color: #7eebd8; ">

    <main class="form-signin">
        <form action="" method="POST">
            <img class="mb-2" src="assets/img/login-logo.png" alt="login" width="300" height="300">
            <h1 class="h3 mt-3 mb-3 fw-normal" style="color: #008037; "><b>SELAMAT DATANG MIMIN</b></h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username"
                    required>
                <label>Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                    required>
                <label>Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Konfirmasi Password"
                    name="password2">
                <label>Konfirmasi Password</label>
            </div>
            <button class="w-50 mt-3 mb-5 btn btn-lg btn-success" name="registrasi" type="submit">Registrasi</button>
        </form>
    </main>

</body>

</html>