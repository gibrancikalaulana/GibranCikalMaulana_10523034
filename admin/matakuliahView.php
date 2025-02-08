<?php
include "../koneksi/koneksi.php";

$queryMatakuliah = "SELECT * FROM matakuliah";
$resultMatakuliah = mysqli_query($koneksi, $queryMatakuliah);
$countMatakuliah = mysqli_num_rows($resultMatakuliah);
?>

<link rel="stylesheet" href="../css/mahasiswa.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<div class="container">
    <div class="sidebar">
        <div class="navbar">
            <a href="dosenAdd.php">Dashboard</a>
            <a href="matakuliahView.php" class="active">Matakuliah</a>
        </div>
        <div class="form-container">
            <h2>DATA MATAKULIAH</h2>
            <hr>
            <div class="action-link">
                <a href="matakuliahAdd.php">TAMBAH DATA MATAKULIAH</a>
            </div>
            <table border="1" class="data-table">
                <thead>
                    <tr>
                        <th>KODE MATAKULIAH</th>
                        <th>NAMA MATAKULIAH</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($countMatakuliah > 0) {
                        while ($dataMatakuliah = mysqli_fetch_array($resultMatakuliah)) {
                    ?>
                    <tr>
                        <td><?php echo $dataMatakuliah['kode_matkul']; ?></td>
                        <td><?php echo $dataMatakuliah['nama_matkul']; ?></td>
                        <td>
                            <a href="matakuliahEdit.php?kode_matkul=<?php echo $dataMatakuliah['kode_matkul']; ?>" class="edit-link">Edit</a>
                            <a href="matakuliahHapus.php?kode_matkul=<?php echo $dataMatakuliah['kode_matkul']; ?>" class="delete-link">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='3'>Belum ada Data Matakuliah</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="background"></div>
</div>
