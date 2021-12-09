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
    <!-- main -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mt-3">CRUD APLIKASI TOKO BUKU</h1>
            <!-- Card form -->
            <div class="card mt-3">
                <div class="card-header bg-info text-white">
                    From Input Data Buku
                </div>
                <div class="card-body">
                    <form role="form" action="insert.php" method="post">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" name="judul_bk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerbit Buku</label>
                            <input type="text" name="terbit_bk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Genre Buku</label>
                            <input type="text" name="genre_bk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Buku</label>
                            <input type="text" name="harga_bk" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-info btn-block mt-3 mb-5 text-white">Simpan</button>
                        <button type="reset" class="btn btn-danger btn-block mt-3 mb-5">Kosongkan</button>
                    </form>
                </div>
            </div>
            <!-- akhir card -->
        </div>
    </div>
    <!-- akhir main -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>