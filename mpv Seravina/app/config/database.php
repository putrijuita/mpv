<?php
$db = new Database();

if(isset($_POST['tambahdata'])) {
    $NamaLengkap        = $_POST['nama'];
    $TempatTanggalLahir = $_POST['tanggallahir'];
    $JenisKelamin       = $_POST['jeniskelamin'];
    $NIK                = $_POST['nik'];
    $db->tambahData($NamaLengkap, $TempatTanggalLahir, $JenisKelamin, $NIK);
    header("location: index.php");
}

$AmbilData = $db->ambilData();

if(isset($_POST['ubahdata'])) {
    $ID                 =  $_POST['id'];
    $NamaLengkap        =  $_POST['nama'];
    $TempatTanggalLahir = $_POST['tanggallahir'];
    $JenisKelamin       = $_POST['jeniskelamin'];
    $NIK                = $_POST['nik'];
    $db->ubahData($ID, $NamaLengkap, $TempatTanggalLahir, $JenisKelamin, $NIK);
    header('Location: index.php');
}

if (isset($_POST['hapus'])) {
    $ID = $_POST['id']; 
    $db->hapusData($ID);
    header('Location: index.php');
}


?>