<?php

class Database {
    private $host = "localhost";
    private $user = "n1577759_seravina";
    private $pass = "latihanphp123";
    private $db   = "n1577759_seravina";
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    }

    public function tambahData($nama, $tanggallahir, $jeniskelamin, $nik) {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO kuesioner (ID, NamaLengkap, TempatTanggalLahir, JenisKelamin, NIK) VALUES ('', ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $nama, $tanggallahir, $jeniskelamin, $nik);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function ambilData() {
        $query = "SELECT * FROM kuesioner";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function ubahData($id, $nama, $tanggallahir, $jeniskelamin, $nik) {
        $stmt = mysqli_prepare($this->conn, "UPDATE kuesioner SET NamaLengkap=?, TempatTanggalLahir=?, JenisKelamin=?, NIK=? WHERE ID=?");
        mysqli_stmt_bind_param($stmt, 'ssssi', $nama, $tanggallahir, $jeniskelamin, $nik, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function hapusData($id) {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM kuesioner WHERE ID = ?");
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}




?>