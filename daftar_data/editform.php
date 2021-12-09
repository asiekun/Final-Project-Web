<?php 
	$id = $_GET['id']; 
	//koneksi database
	include('dbconnect.php');
	//query
	$query = "SELECT * FROM buku WHERE id_buku='$id'";
	$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Card form -->
        <div class="card mt-3">
            <div class="card-header bg-info text-white">
                From Input Data Buku
            </div>
            <div class="card-body">
                <form role="form" action="edit.php" method="get">
                    <?php
				while ($row = mysqli_fetch_assoc($result)) {
			?>
                    <input type="hidden" name="id_bk" value="<?php echo $row['id_buku']; ?>">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_bk" class="form-control"
                            value="<?php echo $row['judul_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Penerbit Buku</label>
                        <input type="text" name="terbit_bk" class="form-control"
                            value="<?php echo $row['penerbit_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Genre Buku</label>
                        <input type="text" name="genre_bk" class="form-control"
                            value="<?php echo $row['genre_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Harga Buku</label>
                        <input type="text" name="harga_bk" class="form-control"
                            value="<?php echo $row['harga_buku']; ?>">
                    </div>
                    <button type="submit" class="btn btn-success btn-block mt-3 mb-3">Update Buku</button>
                    <?php 
				}
				mysqli_close($conn);
				?>
                </form>
            </div>
        </div>
        <!-- akhir card -->
    </div>
</body>

</html>