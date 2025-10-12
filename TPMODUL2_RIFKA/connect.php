<?php
// ============1===========
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$db = "db_tp_modul2";
$port = 3306;

// ===========2============
// Definisikan $conn untuk melakukan koneksi ke database
$socket = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock';
$conn = mysqli_connect($host, $username, $password, $db, $port, $socket);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
