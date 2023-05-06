<?php
	include '../koneksi.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$data_username = $_POST['pls_username'];
		$data_pass = $_POST['pls_password'];

		$uppercase = preg_match('@[A-Z]@', $data_pass);
    	$lowercase = preg_match('@[a-z]@', $data_pass);
    	$number    = preg_match('@[0-9]@', $data_pass);
		
		//Cek Parameter Username dan Password (Kondisi Benar)
		if($data_username == '' || $data_pass== '' ){
			$response['error']=true;
			$response['message']="Data Parameter Kosong!";
		}//Akhir Kondisi Cek Parameter (Kondisi Benar)

		else

		//Cek Parametere Username dan Password (Kondisi Salah)
		{

			//Kondisi Jika Username dan Password sudah di SET
			if(isset($data_username) AND isset($data_pass)){
				
			$cek_user= mysqli_query($connect,"SELECT * from staf_pelaksana where pls_username = '$data_username'");

			$user = mysqli_fetch_array($cek_user);
				$idUser = $user['pls_id'];
				$username = $user['pls_username'];
				$psd = $user['pls_password'];

				//Cek Data Username (Kondisi True)
				if($username!=$data_username){
					$response['error']=true;
	      			$response['message']="Invalid Username!";
	      		}else{

	      			if($psd!=$data_pass){
	      				$response['error']=true;
						$response['message']="Invalid Password!";
					}else{

						if(!$uppercase || !$lowercase || !$number || strlen($data_pass)<=6){
							$response['error']=true;
							$response['message']="Invalid Password!"; 
						}else{
				
									$response['error']=false;
									$response['pls_id'] = $user['pls_id'];
									$response['skpd_id'] = $user['skpd_id'];
									$response['pls_nama'] = $user['pls_nama'];
									$response['pls_email'] = $user['pls_email'];
									$response['pls_nohp'] = $user['pls_nohp'];
									$response['pls_username'] = $user['pls_username'];
									$response['pls_password'] = $user['pls_password'];

									$data_skpd = $user['skpd_id'];

									$skpd_cek=mysqli_query($connect,"SELECT * FROM skpd WHERE skpd_id='$data_skpd'");
										$skpd = mysqli_fetch_array($skpd_cek);
										$response['skpd_nama'] = $skpd['skpd_nama'];				
						}

					}

				}
		}
	}
}//Akhir Kondisi SERVER POST
		echo json_encode($response);
?>