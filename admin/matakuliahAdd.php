<?php
include ('../koneksi/koneksi.php');
?>

<link rel="stylesheet" href="../css/matakuliah.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<div class="container">
    <div class="sidebar">
        <div class="navbar">
            <a href="matakuliahView.php">Matakuliah</a>
        </div>
        <div class="form-container">
            <h2>TAMBAH DATA MATAKULIAH</h2>
            <hr>
            <?php
            if (!isset($_POST['submit'])) {
            ?>
                <form method="post">
                    <table class="text-input">
                        <tr>
                            <td><label for="kode_matkul">KODE MATAKULIAH</label></td>
                            <td><input type="text" id="kode_matkul" name="kode_matkul" required></td>
                        </tr>
                        <tr>
                            <td><label for="nama_matkul">NAMA MATAKULIAH</label></td>
                            <td><input type="text" id="nama_matkul" name="nama_matkul" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <button type="submit" name="submit">TAMBAH</button>
                            </td>
                        </tr>
                    </table>
                </form>
            <?php
            } else {
                $kode_matkul = $_POST["kode_matkul"];
                $nama_matkul = $_POST["nama_matkul"];

                $insertMatakuliah = "INSERT INTO matakuliah (kode_matkul, nama_matkul) VALUES ('$kode_matkul', '$nama_matkul')";
                $queryMatakuliah = mysqli_query($koneksi, $insertMatakuliah);

                if ($queryMatakuliah) {
                    echo "<script>alert('Data Matakuliah Berhasil Disimpan!');</script>";
                    echo "<script>window.location ='matakuliahView.php';</script>";
                } else {
                    echo "<script>alert('Data Matakuliah Gagal Disimpan!');</script>";
                }
            }
            ?>
            <a class="back-link" href="matakuliahView.php">KEMBALI</a>
        </div>
    </div>
    <div class="background"></div>
</div>
