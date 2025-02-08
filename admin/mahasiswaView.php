<?php
include "../koneksi/koneksi.php";

$queryMhs  = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);
?>

<link rel="stylesheet" href="../css/mahasiswa.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3 class="title">DATA MAHASISWA</h3>
        <hr class="divider">
        <a href="mahasiswaAdd.php" class="btn-submit">TAMBAH DATA MAHASISWA</a>
        <br><br>
        <table border="1" class="data-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>JURUSAN</th>
                    <th>PASSWORD</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($countMhs > 0) {
                    while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
                        ?>
                        <tr class="border_value">
                            <td class="value"><?php echo $dataMhs[0]; ?></td>
                            <td class="value"><?php echo $dataMhs[1]; ?></td>
                            <td class="value"><?php echo $dataMhs[2]; ?></td>
                            <td class="value"><?php echo substr($dataMhs[4], 0, 10) . '...'; ?></td>
                            <td class="value"><?php echo $dataMhs[4]; ?></td>
                            <td class="value">
                                <a href="mahasiswaEdit.php?nim=<?php echo $dataMhs[0]; ?>" class="action-link">Edit</a> | 
                                <a href="mahasiswaHapus.php?nim=<?php echo $dataMhs[0]; ?>" class="action-link">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr>
                            <td colspan='6' align='center' height='20'>
                            <div>Belum ada Data Mahasiswa</div>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
