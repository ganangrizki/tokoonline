<?php 
	include 'konekdb.php';

	if (isset($_GET['idkat'])) {
		// code...
		$delete = mysqli_query($konek,"DELETE FROM tb_category WHERE category_id = '".$_GET['idkat']."' ");
		echo '<script>window.location="data-kategori.php"</script>';
	}
 ?>