<?php
	
	include '../koneksi.php';
	include '../AES.php';

	$hasil_scan=$_POST['qr_code'];

	$cek = mysqli_query($connect, "SELECT * FROM surat where enkrip = '$hasil_scan'");
	$data = mysqli_fetch_array($cek);

	if (empty($data)) {
		$response['status_data']= 0;
		die(json_encode($response));
	}else{

	    $inputText = $hasil_scan;
	    $kunci = "EnkripsiDekripsi";
	    $aes = new AES($kunci);
	    $DataInput = hex2bin($inputText);
        $dekripsi = $aes->decrypt($DataInput);

	    $query = mysqli_query($connect, "SELECT * FROM surat where surat_nomor = '$dekripsi'");
	    $row = mysqli_fetch_array($query);

		if (!empty($row)) {

			$surat_nomor = $row['surat_nomor'];
			$surat_tgl_buat = $row['surat_tgl_buat'];
			$surat_perihal = $row['surat_perihal'];
			$surat_ttd_pejabat = $row['surat_ttd_pejabat'];
			$unit_id = $row['unit_id'];

			$response['status_data']= 1;
			$response['message']="Data Surat No : ".$surat_nomor;
			$response['surat_nomor'] = $surat_nomor;
			$response['surat_tgl_buat'] = $surat_tgl_buat;
			$response['unit_id'] = $unit_id;
			$response['surat_perihal'] = $surat_perihal;
			$response['surat_ttd_pejabat'] = $surat_ttd_pejabat;

			$data_unit = $unit_id;
			$unit_query = mysqli_query($connect, "SELECT * FROM unit_kerja where unit_id = '$data_unit'");
			$unit = mysqli_fetch_array($unit_query);
			$response['unit_nama'] = $unit['unit_nama'];
			die(json_encode($response));
		}else{
				$response['status_data']= 0;
				die(json_encode($response));
		}
	}

?>