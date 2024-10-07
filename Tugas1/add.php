<?php
function tambah($data)
{

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'prakweb2024_d_223040173';
    $conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$judul = htmlspecialchars($data["judul"]);
$pengarang = htmlspecialchars($data["pengarang"]);
$terbit = htmlspecialchars($data["tahun_terbit"]);


$query = "INSERT INTO data_buku
            VALUES
          (NULL, '$judul', '$pengarang', '$terbit');
        ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
      echo "
          <script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'index.php';
          </script> ";
    } else {
      echo "
          <script>
              alert('Data gagal ditambahkan');
              document.location.href = 'add.php';
          </script> ";
    }
  }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Data Buku</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
