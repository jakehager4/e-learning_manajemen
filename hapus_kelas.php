<?php
include_once('connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM kelas WHERE kd_kelas = $id";
$result = mysqli_query($conn , $sql);

if ($result) {
	header('location: kelas.php');
} else {
	$status = 'Hapus data gagal dikarenakan : '.mysqli_error($conn);
}



echo $status;

?>

<br><br>
<a href=""></a>