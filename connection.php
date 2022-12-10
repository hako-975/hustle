<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'hustle';

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn) {
	// echo "koneksi berhasil";
	// die;
}
