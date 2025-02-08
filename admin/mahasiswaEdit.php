<?php
include ('../koneksi/koneksi.php');

// Cek apakah 'nim' ada di URL
$getNim = isset($_GET['nim']) ? $_GET['nim'] : null;

if ($getNim) {
    // Mencegah SQL Injection
    $getNim = mysqli_real_escape_string($koneksi, $getNim);
    
    // Query untuk mengambil data mahasiswa
    $editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
    $resultMhs = mysqli_query($koneksi, $editMhs);

    // Cek apakah data ditemukan
    if (mysqli_num_rows($resultMhs) > 0) {
        $dataMhs = mysqli_fetch_array($resultMhs);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='mahasiswaView.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('NIM tidak ditemukan di URL!'); window.location.href='mahasiswaView.php';</script>";
    exit;
}
?>


<link rel="stylesheet" href="../css/mahasiswa.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">


<div class="container">
    <h3 class="title">EDIT DATA MAHASISWA</h3>
    <hr class="divider" />

    <?php
    if (!isset($_POST['submit']))
    {
    ?>
    <form class="form" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" size="30" value="<?php echo $dataMhs[0] ?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="nama">NAMA</label>
            <input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs[1] ?>" />
        </div>
        <div class="form-group">
            <label>JENIS KELAMIN</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="jk" value="Laki-Laki" id="RadioGroup1_0" checked="checked" /> Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jk" value="Perempuan" id="RadioGroup1_1" /> Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="jur">JURUSAN</label>
            <select name="jur" id="jur">
                <option value="<?php echo $dataMhs[3] ?>"><?php echo $dataMhs[3] ?></option>
                <option value="">--PILIH--</option>
                <option value="Sistem Informasi">SISTEM INFORMASI</option>
                <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input name="password" type="text" id="password" size="30" value="<?php echo $dataMhs[4] ?>">
        </div>
        <button class="btn-submit" id="submit" name="submit" type="submit">UBAH</button>
    </form>
    <?php
    }
    else
    {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $jk = $_POST["jk"];
        $jur = $_POST["jur"];
        $password = md5($_POST["password"]);

        $updateMhs = "UPDATE mahasiswa SET nama='$nama',jk='$jk',jur='$jur',password='$password' WHERE nim='$nim'";
        $queryMhs = mysqli_query($koneksi, $updateMhs);

        if ($queryMhs)
        {
            echo "<script>alert('Data Berhasil Diubah !')</script>";
            echo "<script type='text/javascript'>window.location ='mahasiswaView.php'</script>";
        }
        else
        {
            echo "<script>alert('Data Gagal Diubah !')</script>";
            echo "<script type='text/javascript'>window.location ='mahasiswaView.php'</script>";
        }
    }
    ?>
    <a class="back-link" href="mahasiswaView.php">&raquo; KEMBALI </a>
</div>
