<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
include "functions.php";
// ambil data di URL
$id = $_GET["id"];
// query data barang berdasarkan id
$data = query("SELECT * FROM databarang WHERE id = $id")[0];


// cek apakah tombol simpan sudah ditekan atau belum
if (isset($_POST["simpan"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diedit!');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal diedit!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: rgb(134, 243, 197);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" >
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><b>SUPER ASIX MART</b></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item" >
                            <a href="index.php" class="nav-link align-middle px-0" style="color: white;">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tambah.php" class="nav-link align-middle px-0" style="color: white;">
                                Tambah Data
                            </a>
                        </li>
                        <hr>
                        <div class="dropdown">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/img/sign-out.png" alt="hugenerd" width="30" height="30"
                                    class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">SuperAsix Mart</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="container" style="width: 65%;">
                <div class="card mt-3">
                    <div class="card-header text-white" style="background-color: rgb(28, 92, 65);">
                        Form Edit Data Barang
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namabarang"
                                        value="<?= $data["namabarang"]; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Harga Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hargabarang"
                                        value="<?= $data["hargabarang"]; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="stock" value="<?= $data["stock"]; ?>"
                                        required>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex pt-3 justify-content-md-end">
                                <button class="btn btn-info me-md-2" style="color: white;" name="simpan" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>