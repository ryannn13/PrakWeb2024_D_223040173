<?php
function hapus($id)
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'prakweb2024_d_223040173';
    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id = (int)$id;

    $query = "DELETE FROM data_buku WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (hapus($id) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'index.php';
            </script>";
    }
} else {
    echo "
        <script>
            alert('ID tidak ditemukan');
            document.location.href = 'index.php';
        </script>";
}
