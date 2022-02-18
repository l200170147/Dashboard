<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi, "select * from karyawan where no_hp='$_GET[nomer]'");
    $data = mysqli_fetch_array($sql);
    ?>
    <div class="container" id="index">
        <h3> Edit Karyawan</h3>
        <div class="form-wrap">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama_karyawan" class="form-label">nama_karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="<?php echo $data['nama_karyawan']; ?>">
                </div>
                <div class="row">
                    <div class="mb-3 tempat">
                        <label for="tempat_karyawan" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_karyawan" id="tempat_karyawan" value="<?php echo $data["tampat_karyawan"]; ?>">
                    </div>
                    <div class="mb-3 tanggal">
                        <label for="ttl_karyawan" class="form-label">Ttl_karyawan</label>
                        <input type="date" class="form-control" name="ttl_karyawan" id="ttl_karyawan" value="<?php echo $data['ttl_karyawan']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat_karyawan" class="form-label">alamat_karyawan</label>
                    <textarea class="form-control" name="alamat_karyawan" id="alamat_karyawan"><?php echo $data['alamat']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_karyawan" class="form-label">No_Hp</label>
                    <input type="number" class="form-control" name="no_karyawan" id="no_karyawan" value="<?php echo $data['no_hp']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="proses" value="simpan">Submit</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <!-- menyimpan ke database -->
    <?php

    include "koneksi.php";

    if (isset($_POST["proses"])) {
        mysqli_query($koneksi, "update karyawan set
        nama_karyawan = '$_POST[nama_karyawan]',
        ttl_karyawan ='$_POST[ttl_karyawan]',
        tampat_karyawan ='$_POST[tempat_karyawan]',
        alamat = '$_POST[alamat_karyawan]',
        no_hp = '$_POST[no_karyawan]'
        where no_hp ='$_GET[nomer]'");

        echo "data telah diubah";
        // echo "<meta http-equiv=refresh content=2; URL ='index.php'>";
        header('Location: index.php');
    }

    ?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>