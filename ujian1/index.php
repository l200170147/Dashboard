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
    <div class="container" id="index">
        <h3> Dashboard Karyawan</h3>
        <div class="form-wrap">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan">
                </div>
                <div class="row">
                    <div class="mb-3 tempat">
                        <label for="tempat_karyawan" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control " name="tempat_karyawan" id="tempat_karyawan">
                    </div>
                    <div class="mb-3 tanggal">
                        <label for="ttl_karyawan" class="form-label">Tanggal Karyawan</label>
                        <input type="date" class="form-control" name="ttl_karyawan" id="ttl_karyawan">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat_karyawan" class="form-label">Alamat Karyawan</label>
                    <textarea class="form-control" name="alamat_karyawan" id="alamat_karyawan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_karyawan" class="form-label">No Hp</label>
                    <input type="number" class="form-control" name="no_karyawan" id="no_karyawan">
                </div>
                <button type="submit" class="btn btn-primary" name="proses" value="simpan">Submit</button>
            </form>
        </div>

        <!-- menyimpan ke database -->
        <?php
        include "koneksi.php";


        if (isset($_POST["proses"])) {
            mysqli_query($koneksi, "insert into karyawan set
        nama_karyawan ='$_POST[nama_karyawan]',
        ttl_karyawan = '$_POST[ttl_karyawan]',
        tampat_karyawan = '$_POST[tempat_karyawan]',
        alamat ='$_POST[alamat_karyawan]',
        no_hp = '$_POST[no_karyawan]'");

            echo "data berhasil disimpan";
        } else {
            // echo ('gagal');
        }
        ?>

        <!-- Tabel Karyawan-->

        <table border="1">
            <tr>
                <th>Nama Karyawan</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th> Aksi </th>
            </tr>

            <!-- Menampilkan Data Ke Tabel -->
            <?php
            include "koneksi.php";
            $ambil_data = mysqli_query($koneksi, "select * from karyawan");
            while ($tampil = mysqli_fetch_array($ambil_data)) {
                echo "
                    <tr>
                        <td> $tampil[nama_karyawan] </td>
                        <td>$tampil[tampat_karyawan], $tampil[ttl_karyawan] </td>
                        <td> $tampil[alamat] </td>
                        <td> $tampil[no_hp] </td>
                        <td> <a href ='hapus.php?nomer=$tampil[no_hp]' class='btn btn-danger'> Hapus </a>
                        <a href ='update.php?nomer=$tampil[no_hp]' class='btn btn-info text-white'> Edit </a> </td>
                    </tr>";
            }

            ?>
        </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>