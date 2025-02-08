<?php
include ('../koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
    <link rel="stylesheet" href="../css/mahasiswa.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <h3 class="title">Tambah Data Mahasiswa</h3>
    <hr class="divider">

    <?php
    if (!isset($_POST['submit']))
    {
    ?>
    <form enctype="multipart/form-data" method="post" class="form">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" placeholder="Masukkan NIM">
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="jk" value="Laki-Laki"> Laki-Laki</label>
                <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select id="jurusan" name="jurusan">
                <option value="">-=PILIH=-</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password">
        </div>

        <div class="form-group">
            <button type="submit" id="submit" name="submit" class="btn-submit">Tambah</button>
        </div>
    </form>
    <?php
    }
    else
    {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $jk = $_POST["jk"];
        $jurusan = $_POST["jurusan"];
        $password = md5($_POST["password"]);

        $insertMhs = "INSERT INTO mahasiswa VALUE ('$nim','$nama','$jk','$jurusan','$password')";
        $queryMhs = mysqli_query($koneksi, $insertMhs);

        if ($queryMhs)
        {
            echo "<script>alert('Daftar Berhasil Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location ='mahasiswaView.php'</script>";
        }
        else
        {
            echo "<script>alert('Daftar Gagal Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location ='mahasiswaView.php'</script>";
        }
    }
    ?>
    <a href="mahasiswaView.php" class="back-link">&raquo; Kembali</a>
</div>
</body>
</html>
