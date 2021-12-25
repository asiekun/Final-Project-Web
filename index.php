<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
include "functions.php";

$data = query("SELECT * FROM databarang");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPER ASIX MART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: rgb(134, 243, 197);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><b>SUPER ASIX MART</b></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
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
                        <div class="dropdown ">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/img/sign-out.png" alt="keluar" width="30" height="30"
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
            <div class="col py-3 text-center">
                <h1>Detail Barang</h1>
                <table class="table table-secondary table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga Barang</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Next</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($data as $row): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["namabarang"];?></td>
                            <td><?= rupiah($row["hargabarang"]);?></td>
                            <td><?= $row["stock"];?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'];?>" class="btn btn-success" role="button">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']?>" class="btn btn-danger" role="button"
                                    onclick="return confirm('Ingin menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>