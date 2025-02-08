<?php 
// Konfigurasi database
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$nama_db = 'nilaionline';

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $nama_db) or die ("koneksi mysql gagal");
?>