<?php
	include 'koneksi.php';
	date_default_timezone_set("Asia/Jakarta");

	$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
		<title>Website - <?= $d->nama ?></title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
	      tinymce.init({
	        selector: '#keterangan'
	      });
	    </script>
</head>
<body>

	<!-- box menu mobile -->
	<div class="box-menu-mobile" id="mobileMenu">
	<!-- <div id="navbar" class="navbar-collapse collapse"> -->
		<span onclick="hideMobileMenu()">Close</span>
		<ul class="text-center">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
			<!-- <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li> -->
			<li><a href="jurusan.php">Catalog</a></li>
			<!-- <li><a href="galeri.php">Galeri</a></li> -->
			<!-- <li><a href="informasi.php">Location</a></li> -->
			<li><a href="kontak.php">About Us</a></li>
		</ul>
	</div>

	<!-- bagian header -->
	<div class="header">

		<div class="container">

			<div class="header-logo">
				<img src="uploads/identitas/<?= $d->logo?>" width="70">
				<h2><a href="index.php"><?= $d->nama ?></a></h2>
			</div>

			<ul class="header-menu">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
				<!-- <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li> -->
				<li><a href="jurusan.php">Catalog</a></li>
				<!-- <li><a href="galeri.php">Galeri</a></li> -->
				<!-- <li><a href="informasi.php">Location</a></li> -->
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="kontak.php">About Us</a></li>
				<li><a href="Login.php">Login</a></li>
			</ul>

			<div class="mobile-menu-btn text-center">
				<a href="#" onclick="showMobileMenu()">Menu</a>
			</div>

		</div>

	</div>