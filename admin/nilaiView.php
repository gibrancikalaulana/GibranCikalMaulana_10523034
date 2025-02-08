<?php
include "../koneksi/koneksi.php";

$queryNilai = "SELECT 
                    m.nim, 
                    m.nama, 
                    n.nl_tugas, 
                    n.nl_uts, 
                    n.nl_uas, 
                    (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir, 
                    d.nip, 
                    d.nama 
                FROM nilai n
                LEFT JOIN mahasiswa m ON n.nim = m.nim
                LEFT JOIN dosen d ON d.nip = n.nip";

$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>
<link rel="stylesheet" href="../css/nilai2.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai</title>
    <link rel="stylesheet" href="style.css"> <!-- Sesuaikan dengan nama file CSS -->
</head>
<body>
    <div class="container">
        <h3 class="title">Data Nilai</h3>
        <hr class="divider">
        <a href="nilaiAdd.php"><button class="btn-submit">Tambah Data Nilai</button></a>
        <br><br>
        <table border="1" class="table">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>

            <?php if ($countNilai > 0): ?>
                <?php while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)): ?>
                    <tr class="add">
                        <td class="value"><?php echo $dataNilai[0]; ?></td>
                        <td class="value"><?php echo $dataNilai[1]; ?></td>
                        <td class="value"><?php echo $dataNilai[2]; ?></td>
                        <td class="value"><?php echo $dataNilai[3]; ?></td>
                        <td class="value"><?php echo $dataNilai[4]; ?></td>
                        <td class="value"><?php echo number_format($dataNilai[5], 2); ?></td>
                        <td class="value"><?php echo $dataNilai[6]; ?></td>
                        <td class="value"><?php echo $dataNilai[7]; ?></td>
                        <td class="value">
                            <a href="nilaiEdit..php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" class="btn-edit">Edit</a>
                            <a href="nilaiHapus.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" class="btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" align="center">Belum ada Data Mahasiswa</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
