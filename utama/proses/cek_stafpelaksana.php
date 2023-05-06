<?php
include '../../koneksi.php';
 
$pls_username = $_POST['pls_username'] ? $_POST['pls_username'] : '';
 
$sql = "SELECT COUNT(*) AS countUsr FROM staf_pelaksana WHERE pls_username = '$pls_username'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);
$count = $row['countUsr'];
 
echo $count;
 
?>