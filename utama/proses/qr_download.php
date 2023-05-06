<?php
include"../../koneksi.php";

$id_surat  = $_GET['id_surat'];


   $sql= mysqli_query($connect,"SELECT * FROM surat WHERE id_surat = '$id_surat'");
   $data = mysqli_fetch_array($sql);

if(!empty($id_surat)){
	$fileName = basename($data['qrcode']);
	$filePath = "../../qrcode/".$fileName;

	if(!empty($fileName) && file_exists($filePath)){

		//DEFINISI HEADER
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$fileName");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");

		//Read File
		readfile($filePath);
		exit();
		header("location:../surat.php");
	}

	else {
		echo "File Not Exit";
	}
window.close(qr_download.php);
}
?>