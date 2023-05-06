<link rel="stylesheet" href="assets/css/sweetalert.css" />
<script src="assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
session_start();

include "koneksi.php";

$tu_username= $_POST["tu_username"];
$tu_password = $_POST["tu_password"];

	$uppercase = preg_match('@[A-Z]@', $tu_password);
    $lowercase = preg_match('@[a-z]@', $tu_password);
    $number    = preg_match('@[0-9]@', $tu_password);

//ISSET
if(isset($tu_username) AND isset($tu_password)){

    $cekUser = mysqli_query($connect,"SELECT * from staftu where tu_username ='$tu_username'");
    $data= mysqli_fetch_array($cekUser);
        $username = $data['tu_username'];
        $psd = $data['tu_password'];
    
    if($tu_username!=$username){
		echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Login Gagal! Invalid Username!',
                type: 'error'
            }, function() {
                window.location.href = 'index.php'; 
            });
      }, 200);
      </script>";
	}else{
		
			if($tu_password!=$psd){
					echo "<script>
        					setTimeout(function() {
            				swal({
                				title: 'Oopss!',
                				text: 'Login Gagal! Invalid Password!',
                				type: 'error'
            				}, function() {
                				window.location.href = 'index.php'; 
            				});
      					}, 200);
      					</script>"; 
			}else{

                    if(!$uppercase || !$lowercase || !$number || strlen($tu_password)<=6){
                        echo "<script>
                            setTimeout(function() {
                            swal({
                                title: 'Oopss!',
                                text: 'Login Gagal! Invalid Password!',
                                type: 'error'
                            }, function() {
                                window.location.href = 'index.php'; 
                            });
                        }, 200);
                        </script>"; 
                    }else{
						     $_SESSION['tu_id'] = $data['tu_id'];
 						     $_SESSION['tu_nama'] = $data['tu_nama'];
 						     $_SESSION['tu_email'] = $data['tu_email'];
                             $_SESSION['tu_foto'] = $data['tu_foto'];
						     $_SESSION['tu_nohp'] = $data['tu_nohp'];
						     $_SESSION['tu_username'] = $data['tu_username'];
 						     $_SESSION['tu_password'] = $data['tu_password'];

						echo "<script>
        						setTimeout(function() {
            					swal({
                					title: 'Success!',
                					text: 'Login Berhasil!',
                					type: 'success'
            					}, function() {
               	 					window.location.href = 'utama/index.php'; 
           						 });
        						}, 200);
        						</script>";
                            }
				}
	//CEK USERNAME
    }
//ISSET
}

?>