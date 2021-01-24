<?php
include_once('connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM mahasiswa WHERE nim = $id";
$result = mysqli_query($conn , $sql);

if ($result) {
	header('location: mahasiswa.php');
} else {
	$status = 'Hapus data gagal : '.mysqli_error($conn);
}



echo $status;

?>

<br><br>
<a href=""></a>