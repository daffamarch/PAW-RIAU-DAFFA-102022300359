<?php
include 'connect.php';
// ==================1==================
// If statement untuk mengambil GET request dari URL kemudian simpan variabel id
if (isset($_GET['id'])) {
    $id = $_GET["id"];


    // ==================2==================
    // Definisikan $query untuk menghapus data menggunakan $id
    $delete_query = "DELETE FROM tb_buku WHERE id = '$id'";

    mysqli_query($conn, $delete_query);

    // ==================3==================
    // Eksekusi query

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "
        <script>
            alert('Data gagal untuk dihapus');
            document.location.href = katalog_buku.php;
        </script>
        ";
        exit;
    }
}
mysqli_close($conn);
?>