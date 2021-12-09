<?php
	session_start();
	if (!isset($_SESSION['log'])) {
		header('location:../login.php');
		exit;
	}
	//koneksi dbconnect
	include('dbconnect.php');
	//query
	$query = "SELECT * FROM buku";
	$result = mysqli_query($conn , $query);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard | Admin</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item text-white">
                        <h4 class="m-1">DASHBOARD</h4>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="input.php">Input Data </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"
                            onclick="return confirm('Yakin ingin keluar?')">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- main -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mt-3">TOKO BUKU</h1>
            <!-- Card form -->

            <!-- tabel -->
            <div class="card mt-3 mb-5">
                <div class="card-header bg-success text-white">
                    Daftar Buku
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Penerbit Buku</th>
                                    <th scope="col">Genre Buku</th>
                                    <th scope="col">Harga Buku</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
						$no = 1;  
						while ($row = mysqli_fetch_assoc($result)) {
						?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['judul_buku']; ?></td>
                                    <td><?php echo $row['penerbit_buku']; ?></td>
                                    <td><?php echo $row['genre_buku']; ?></td>
                                    <td><?php echo $row['harga_buku']; ?></td>
                                    <td>
                                        <a href="editform.php?id=<?php echo $row['id_buku'];?>" class="btn btn-success"
                                            role="button">Ubah</a>
                                        <a href="delete.php?id=<?php echo $row['id_buku']?>" class="btn btn-danger"
                                            role="button" onclick="return confirm('Hapus?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php
						}
						mysqli_close($conn); 
						?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- akhir tabel -->
        </div>
    </div>
    <!-- akhir main -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>