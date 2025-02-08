<?php
include ('../koneksi/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
    <link rel="stylesheet" href="../css/dosen.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Navbar -->
            <div class="navbar">
                <a href="mahasiswaAdd.php">Mahasiswa</a>
                <a href="matakuliahAdd.php">Matakuliah</a>
                <a href="nilaiAdd.php">Nilai</a>
                <a href="contact.php">Contact</a>
            </div>

            <!-- Formulir -->
            <div class="form-container">
                <h2>TAMBAH DATA <br>DOSEN</h2>
                <br>
                <?php
                if (!isset($_POST['submit'])) {
                ?>
                    <form method="post">
                        <div class="form-group">
                            <table class="text-input">
                                <tr>
                                    <td>NIP</td>
                                    <td><input type="text" name="nip" required></td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td><input type="text" name="nama" required></td>
                                </tr>
                                <tr>
                                    <td>KODE MATAKULIAH</td>
                                    <td><input type="text" name="kode_matkul" required></td>
                                </tr>
                                <tr>
                                    <td>PASSWORD</td>
                                    <td><input type="password" name="password" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" name="submit">TAMBAH</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                <?php
                } else {
                    $nip = $_POST["nip"];
                    $nama = $_POST["nama"];
                    $kode_matkul = $_POST["kode_matkul"];
                    $password = md5($_POST["password"]);

                    $insertDosen = "INSERT INTO dosen (nip, nama, kode_matkul, password) VALUES ('$nip', '$nama', '$kode_matkul', '$password')";
                    $queryDosen = mysqli_query($koneksi, $insertDosen);

                    if ($queryDosen) {
                        echo "<script>alert('Data Dosen Berhasil Disimpan!');</script>";
                        echo "<script>window.location ='dosenView.php';</script>";
                    } else {
                        echo "<script>alert('Data Dosen Gagal Disimpan!');</script>";
                    }
                }
                ?>
                <br><a href="dosenView.php">KEMBALI</a>
            </div>
        </div>

        <!-- Background Gambar -->
        <div class="background">
            <!-- Gambar diatur lewat CSS -->
        </div>
    </div>
</body>
</html>
