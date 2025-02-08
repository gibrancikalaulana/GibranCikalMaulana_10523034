<?php
include ('../koneksi/koneksi.php');
?>

<link rel="stylesheet" href="../css/nilai.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Nilai</title>
    <link rel="stylesheet" href="../css/matakuliah.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    
    <div class="form-container">
        <h2>TAMBAH DATA NILAI</h2>
        <hr>
        <?php
        if (!isset($_POST['submit'])) {
        ?>
            <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="mhs">NAMA MAHASISWA</label>
                    <select name="mhs" id="mhs" class="form-control" required>
                        <option value="">-=PILIH=-</option>
                        <?php
                        $queryMhs = "SELECT nim, nama FROM mahasiswa";
                        $resultMhs = mysqli_query($koneksi, $queryMhs);
                        while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
                            echo "<option value='$dataMhs[0]'>$dataMhs[1]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dosen">NAMA DOSEN</label>
                    <select name="dosen" id="dosen" class="form-control" required>
                        <option value="">-=PILIH=-</option>
                        <?php
                        $queryDosen = "SELECT nip, nama FROM dosen";
                        $resultDosen = mysqli_query($koneksi, $queryDosen);
                        while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)) {
                            echo "<option value='$dataDosen[0]'>$dataDosen[1]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tugas">NILAI TUGAS</label>
                    <input type="number" id="nl_tugas" name="nl_tugas" min="0" max="100" required>
                </div>

                <div class="form-group">
                    <label for="uts">NILAI UTS</label>
                    <input type="number" id="nl_uts" name="nl_uts" min="0" max="100" required>
                </div>

                <div class="form-group">
                    <label for="uas">NILAI UAS</label>
                    <input type="number" id="nl_uas" name="nl_uas" min="0" max="100" required>
                </div>

                <button type="submit" name="submit" class="btn-submit">TAMBAH</button>
            </form>
        <?php
        } else {
            $mhs   = $_POST["mhs"];
            $dosen = $_POST["dosen"];
            $nl_tugas = $_POST["nl_tugas"];
            $nl_uts   = $_POST["nl_uts"];
            $nl_uas   = $_POST["nl_uas"];

            // Input Data Nilai
            $insertNilai = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) VALUES ('$mhs', '$dosen', '$nl_tugas', '$nl_uts', '$nl_uas')";
            $queryNilai = mysqli_query($koneksi, $insertNilai);

            if ($queryNilai) {
                echo "<script>alert('Data Berhasil Disimpan!'); window.location='nilaiView.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan data!'); window.location='nilaiView.php';</script>";
            }
        }
        ?>
        <a class="back-link" href="nilaiView.php">KEMBALI</a>
    </div>
</div>

</body>
</html>
