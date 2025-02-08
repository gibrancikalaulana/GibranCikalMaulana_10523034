<?php
include ('../koneksi/koneksi.php');

$editDosen = "select nip, nama, kode_matkul from dosen";
$resultDosen = mysqli_query($koneksi, $editDosen);
$dataDosen = mysqli_fetch_array($resultDosen);
?>

<link rel="stylesheet" href="../css/dosen.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<div class="container">
    <div class="sidebar">
        <div class="navbar">
            <a href="dosenView.php">KEMBALI</a>
        </div>
        <div class="form-container">
            <h2>Edit Data Dosen</h2>
            <?php if (!isset($_POST['submit'])) { ?>
            <form method="post">
                <table class="text-input">
                    <tr>
                        <td>NIP</td>
                        <td><input type="text" name="nip" value="<?php echo $dataDosen['nip']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" value="<?php echo $dataDosen['nama']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Kode Matakuliah</td>
                        <td><input type="text" name="kode_matkul" value="<?php echo $dataDosen['kode_matkul']; ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="submit">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            } else {
                $nama = $_POST["nama"];
                $kode_mtkul = $_POST["kode_matkul"];

                $updateDosen = "UPDATE dosen SET nama='$nama', kode_matkul='$kode_matkul' WHERE nip='$getNip'";
                $queryUpdate = mysqli_query($koneksi, $updateDosen);

                if ($queryUpdate) {
                    echo "<script>alert('Data Dosen Berhasil Diupdate!');</script>";
                    echo "<script>window.location ='dosenView.php';</script>";
                } else {
                    echo "<script>alert('Data Dosen Gagal Diupdate!');</script>";
                }
            }
            ?>
        </div>
    </div>
    <div class="background"></div>
</div>

