<?php 
	session_start();
	include 'konekdb.php';
	if($_SESSION['status_login']!= true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($konek, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
	$a = mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
	<div class="container">
		<h1><a href="">Toko Online</a></h1>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="data-kategori.php">Data Kategori</a></li>
			<li><a href="data-produk.php">Data Produk</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Profil</h3>
			<div class="box">
				<form action="" method="POST">
					Nama Lengkap: 
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $a->admin_name ?>" required>

					Username:
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $a->username ?>" required>

					Nomor Hp:
					<input type="text" name="hp" placeholder="Nomor Hp" class="input-control" value="<?php echo $a->admin_telp ?>" required>

					Email:
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $a->admin_email ?>" required>
					Alamat:
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $a->admin_address ?>" required>
					<input type="submit" name="submit" value="Update Profil" class="button">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama 	= ucwords($_POST['nama']) ;
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']) ;

						$update = mysqli_query($konek, "UPDATE tb_admin SET
										admin_name = '".$nama."',
										username = '".$user."',
										admin_telp = '".$hp."',
										admin_email= '".$email."',
										admin_address= '".$alamat."'
										WHERE admin_id='".$a->admin_id."' ");

						if ($update) {
							echo '<script>alert("Data berhasil di update")</script>';
							echo '<script>window.location="profil.php"</script>';
						}else{
							echo 'gagal'.mysql_error($konek);
						}

					}

				?>
			</div>

			<h3>Ubah Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control"  required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password" class="button">
				</form>
				<?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Konfirmasi password baru tidak sesuai")</script>';
						}else{

							$u_pass = mysqli_query($konek, "UPDATE tb_admin SET
										password = '".$pass1."'
										WHERE admin_id='".$a->admin_id."' ");

							if($u_pass){
								echo '<script>alert("Data berhasil di update")</script>';
								echo '<script>window.location="profil.php"</script>';
							}else{
								echo 'gagal'.mysql_error('$konek');
							}

						}

					}

				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - Toko Online</small>
		</div>
	</footer>

</body>
</html>