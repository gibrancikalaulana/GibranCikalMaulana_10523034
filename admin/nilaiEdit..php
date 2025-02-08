<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$getNip = $_GET['nip'];

$editNilai = "SELECT * FROM nilai WHERE nim='$getNim' AND nip='$getNip'";
$resultNilai = mysqli_query($koneksi, $editNilai);
$dataNilai = mysqli_fetch_array($resultNilai);
?>

<link rel="stylesheet" href="../css/nilai.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

<div class="container">
    <!-- Sidebar Navigasi -->
    
    </div>

    <!-- Formulir Edit Nilai -->
    <div class="content">
        <div class="form-container">
            <h2 class="title">EDIT DATA NILAI</h2>
            <hr class="divider">

            <?php if (!isset($_POST['submit'])) { ?>
                <form method="post" class="form">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <select name="nim" id="nim">
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryMhs  = "SELECT nim, nama FROM mahasiswa";
                            $resultMhs = mysqli_query($koneksi, $queryMhs);
                            while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
                                $selected = ($dataMhs[0] == $getNim) ? "selected" : "";
                                echo "<option value='$dataMhs[0]' $selected>$dataMhs[1]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <select name="nip" id="nip">
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryDosen = "SELECT nip, nama FROM dosen";
                            $resultDosen = mysqli_query($koneksi, $queryDosen);
                            while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)) {
                                $selected = ($dataDosen[0] == $getNip) ? "selected" : "";
                                echo "<option value='$dataDosen[0]' $selected>$dataDosen[1]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nl_tugas">Nilai Tugas</label>
                        <input type="text" name="nl_tugas" id="nl_tugas" value="<?php echo $dataNilai['nl_tugas']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nl_uts">Nilai UTS</label>
                        <input type="text" name="nl_uts" id="nl_uts" value="<?php echo $dataNilai['nl_uts']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nl_uas">Nilai UAS</label>
                        <input type="text" name="nl_uas" id="nl_uas" value="<?php echo $dataNilai['nl_uas']; ?>">
                    </div>

                    <button type="submit" name="submit" class="btn-submit">UPDATE</button>
                </form>
            <?php } else {
                $nim = $_POST["nim"];
                $nip = $_POST["nip"];
                $nl_tugas = $_POST["nl_tugas"];
                $nl_uts = $_POST["nl_uts"];
                $nl_uas = $_POST["nl_uas"];

                $updateNilai = "UPDATE nilai SET nl_tugas='$nl_tugas', nl_uts='$nl_uts', nl_uas='$nl_uas' WHERE nim='$nim' AND nip='$nip'";
                $queryUpdate = mysqli_query($koneksi, $updateNilai);

                if ($queryUpdate) {
                    echo "<script>alert('Data Nilai Berhasil Diupdate!');</script>";
                    echo "<script>window.location ='nilaiView.php';</script>";
                } else {
                    echo "<script>alert('Data Nilai Gagal Diupdate!');</script>";
                }
            } ?>

            <a class="back-link" href="nilaiView.php">KEMBALI</a>
        </div>
    </div>
</div>
