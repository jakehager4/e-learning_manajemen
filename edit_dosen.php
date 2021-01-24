<?php
include_once('connection.php');
$id = $_GET['id'];
$sql = "SELECT * FROM dosen WHERE nip = $id";
$dosen = mysqli_query($conn , $sql);
$data = mysqli_fetch_object($dosen);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include_once('connection.php');

	$nip = $_POST['txt_nip'];
	$nama = $_POST['txt_nama'];
	$alamat = $_POST['txt_alamat'];
	$sql = "UPDATE dosen SET nama_dosen = '$nama' , alamat = '$alamat' WHERE nip = $nip;";
	$result = mysqli_query($conn , $sql);

	if ($result) {
		header('location: dosen.php');
	} else {
		$status = 'Ubah data gagal : '.mysqli_error($conn);
	}
} 



?>
<head>
	<link rel="icon" href="./assets/icon.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="styles.css">

	<style>
		a {
			font-family: sans-serif;
			font-size: 15px;
			background: #FF8C00;
			color: white;
			border: white 3px solid;
			border-radius: 5px;
			padding: 12px 20px;
			margin-top: 10px;
		}
		a {
			text-decoration: none;
		}
		a:hover{
			opacity:0.9;
		}
	</style>

	<style type="text/css">
		<title>Manajemen E-Learning (Dosen)</title>
		<style type="text/css">
	</style>
	<center class="w3-animate-top" style="animation-duration: 2s;">
		<div class="row">
			<div class="p-1 col-6" style="background-image: linear-gradient(to right, #1E90FF , #1E90FF); ">
				<h6 class="text-white">
					<img src="./assets/icon.png" alt="" style="width: 25px" class="rounded-circle">
					Manajemen E-Learning (Dosen)
				</h6>

			</div>
			<div class="p-1 col-6" style="background-image: linear-gradient(to right, #1E90FF , #1E90FF); ">
				<a href="index.html" class="btn btn-warning text-black rounded-0" style="width: 10%">
					Home
				</a>
			</div>
		</div>
	</head>
	<table><tr>
		<th>
			<a href="kelas.php">Kelas</a>
		</th>
		<th>
			<a href="mahasiswa.php">Mahasiswa</a>
		</th>
		<th>
			<a href="dosen.php">Dosen</a>
		</th>
		<th>
			<a href="dosen_kelas.php">Data kelas Dosen</a>
		</th>
		<th>
			<a href="mahasiswa_kelas.php">Data kelas Mahasiswa</a> 
		</th>
	</th>
</tr>
</table>
<br>
<br>
<br>
<main>
	<table>
		<tr>
			<th>
				<div>
					<form action="" method="POST">
						<h5>NIP</h5>
						<input type="text" name = "txt_nip" placeholder = "Masukan NIP" value="<?= $data->nip ?>">
					</div>
				</th>
				<th>
					<div>
						<h5>Nama Dosen</h5>
						<input type="text" name = "txt_nama" placeholder = "Masukan Nama Dosen" value="<?= $data->nama_dosen ?>">
					</div>
				</th>
				<br>
				<br>
				<br>
				<th>
					<div>
						<h5>Alamat</h5>
						<textarea type ="text" name="txt_alamat" rows="5" placeholder = "Masukan Alamat"><?= $data->alamat ?></textarea>
					</div>
				</th>
				<th>
					<div>
						<input class="text-white" type="submit" value = "Ubah" style="background-color: orange"onclick="javascript: return confirm('Anda yakin ubah ?')"></div>
						<br>
						<br>
						<br>
						<a href="dosen.php">Kembali</a>
					</form>
				</th>
			</table>
		</main>
		<footer class ="p-1 text-white" style="background-image: linear-gradient(to right, #1E90FF , #1E90FF);">
			<div class="row">
				<div class="col-6">
					<h6 style="text-align: left" >
						©William Adams Soeherman 2021
					</h6>
				</div>
				<div class="col-6">
					<h6 style="text-align : right">
						williamsoeherman@gmail.com
					</h6>
				</div>
			</div>
		</footer>
	</center>