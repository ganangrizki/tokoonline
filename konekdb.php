<?php 
	$hostname	= 'localhost';
	$username	= 'root';
	$password	= '';
	$dbname		= 'db_tokoonline';

	$konek = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal koneksi ke database');
 ?>