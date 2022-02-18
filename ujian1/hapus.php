 <!-- function hapus data -->
 <?php
        include "koneksi.php";
        if (isset($_GET["nomer"])) {
            mysqli_query($koneksi, "delete from karyawan where no_hp='$_GET[nomer]'");
            echo "data berhasil terhapus";
            header('Location: index.php');
        }
        ?>