<?php

include_once('connection.php');  
if (isset($_POST['kata_kunci'])) {
	$kata_kunci=trim($_POST['kata_kunci']);
	$sql="select * from mahasiswa_kelas where id like '%".$kata_kunci."%' or nim_mahasiswa like '%".$kata_kunci."%' or kd_kelas like '%".$kata_kunci."%' order by id asc";

}else {
	$sql="select * from mahasiswa_kelas order by id asc";
}

$hasil=mysqli_query($conn,$sql);

?>
<head>
	<link rel="icon" href="./assets/icon.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
		<title>Manajemen E-Learning (Kelas Mahasiswa)</title>
		<style type="text/css">
	</style>
	<center class="w3-animate-top" style="animation-duration: 2s;">
		<div class="row">
			<div class="p-1 col-6" style="background-image: linear-gradient(to right, #1E90FF , #1E90FF); ">
				<h6 class="text-white">
					<img src="./assets/icon.png" alt="" style="width: 25px" class="rounded-circle">
					Manajemen E-Learning (Kelas Mahasiswa)
				</h6>

			</div>
			<div class="p-1 col-6" style="background-image: linear-gradient(to right, #1E90FF , #1E90FF); ">
				<a href="index.html" class="btn btn-warning text-black rounded-0" style="width: 10%">
					Home
				</a>
			</div>
		</div>

	</head>
	<body>
		<main>
			<center>
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
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
			<div class="form-group">
				<label for="sel1">Kata Kunci:</label>
				<?php
				$kata_kunci="";
				if (isset($_POST['kata_kunci'])) {
					$kata_kunci=$_POST['kata_kunci'];
				}
				?>
				<input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
			</div>
			<div class="row">
				<div class="p col-6 text-center">
					<div class="form-group">
						<input type="submit" class="btn btn-warning" value="Cari">
					</div>
				</form>
			</div>
			<div class="p col-6 text-center">
				<a href="tambah_mahasiswakelas.php">Tambah Kelas Mahasiswa</a>
			</div>
		</div>
		<table>
			<tr>
				<th>id</th>
				<th>
				Kode Kelas</th>
				<th>
				NIM Mahasiswa</th>
				<th>
					Aksi
				</th>
			</tr>

			<?php while ($data = mysqli_fetch_object($hasil)){ ?>
				<tr>
					<td><?= $data->id ?></td>
					<td>
						<?= $data->kd_kelas ?></td>
						<td>
							<?= $data->nim_mahasiswa ?></td>
							<td>
								<a href="edit_mahasiswakelas.php?id=<?= $data->id ?>">Ubah</a> |
								<a href="hapus_mahasiswakelas.php?id=<?= $data->id ?>"onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</a>
							</td>
						</tr>
					<?php } ?>

				</table>
				<br>
			</center>
		</main>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
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
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="./assets/js/bootstrap.bundle.min.js"></script>
	</body>