<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
<?php
require "./connect.php";

if (isset($_POST["update"])) {
    $id = $_GET["id"];

    $judulbuku = $_POST["judul"];
    $penulisbuku = $_POST["penulis"];
    $tahun_terbit = $_POST["tahun_terbit"];

    $query = "UPDATE tb_buku SET
    judul='$judulbuku',
    penulis='$penulisbuku',
    tahun_terbit='$tahun_terbit'
    WHERE id=$id";

    $test = mysqli_query($conn, $query);

    // condition query is works or not
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: katalog_buku.php");
        exit();
    } else {
        echo "
        <script>
            alert('Data gagal diupdate');
            document.location.href = katalog_buku.php;
        </script>
        ";
        exit;
    }
}