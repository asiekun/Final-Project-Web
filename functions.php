<?php 
$conn = mysqli_connect("localhost","root","","superasik");

function registrasi($data){
    global $conn;
    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM registrasi WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar!');
                document.location.href = 'registrasi.php';
            </script>
        ";
        return false;
    }
    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
                document.location.href = 'registrasi.php';
            </script>
        ";
        return false;
    }
    // enksripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // tambah ke database
    mysqli_query($conn, "INSERT INTO registrasi VALUES('', '$username', '$password')");
    
    return mysqli_affected_rows($conn);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $namabarang     = htmlspecialchars($data["namabarang"]);
    $hargabarang    = htmlspecialchars($data["hargabarang"]);
    $stok           = htmlspecialchars($data["stok"]);

    $query = "INSERT INTO databarang VALUES('', '$namabarang', '$hargabarang', '$stok')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM databarang WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id             = $data["id"];
    $namabarang     = htmlspecialchars($data["namabarang"]);
    $hargabarang    = htmlspecialchars($data["hargabarang"]);
    $stok           = htmlspecialchars($data["stok"]);

    $query = "UPDATE  databarang SET 
                namabarang = '$namabarang',
                hargabarang = '$hargabarang',
                stok = '$stok'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}


function rupiah($angka){
    $hasil = "Rp " . number_format($angka, '0', ',', '.');
    return $hasil;
}

?>