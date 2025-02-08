<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);
?>
<link rel="stylesheet" href="../css/dosen2.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<div class="container">
    <div class="sidebar">
        <div class="navbar">
            <a href="dosenAdd.php">Tambah Data Dosen</a>
        </div>
        <div class="form-container">
            <h2>Data Dosen</h2>
            <table border="1" class="text-input">
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Kode Matakuliah</th>
                    <th>Aksi</th>
                </tr>
                <?php
                if ($countDosen > 0) {
                    while ($dataDosen = mysqli_fetch_array($resultDosen)) {
                ?>
                <tr>
                    <td><?php echo $dataDosen['nip']; ?></td>
                    <td><?php echo $dataDosen['nama']; ?></td>
                    <td><?php echo $dataDosen['kode_matkul']; ?></td>
                    <td>
                        <a href="dosenEdit.php?nip=<?php echo $dataDosen['nip']; ?>" class="action-link">Edit</a>
                        <a href="dosenHapus.php?nip=<?php echo $dataDosen['nip']; ?>" class="action-link">Hapus</a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>Belum ada Data Dosen</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="background"></div>
</div>
