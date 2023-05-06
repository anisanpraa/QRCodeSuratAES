<link rel="stylesheet" href="../assets/css/sweetalert.css" />
<script src="../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php 

include "../koneksi.php";


if(isset($_POST["createPass"])){

    $pls_email  = $_POST['pls_email'];
    $dataPass = $_POST['dataPass'];
    $passFix = $_POST['passFix'];

    if($dataPass!=$passFix){
        echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Password Tidak Sama!',
                        type: 'error'
                        }, function() {
                            window.close('passUpdate.php');
                        });
                    }, 200);
                  </script>";
    }else{
        $uppercase = preg_match('@[A-Z]@', $passFix);
        $lowercase = preg_match('@[a-z]@', $passFix);
        $number    = preg_match('@[0-9]@', $passFix);

        if(!$uppercase || !$lowercase || !$number || strlen($passFix)<6){
            echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Update Gagal! Password Min 6 Karakter, ada huruf BESAR, huruf kecil dan angka!',
                        type: 'error'
                        }, function() {
                         window.close('passUpdate.php');
                    });
                }, 200);
        </script>";
        
        //Akhir Kondisi Password Salah
        }else{
        
        $update = mysqli_query($connect,"UPDATE staf_pelaksana SET pls_password = '$passFix', token_pass=NULL , token_exp=NULL WHERE pls_email='$pls_email'");
      
        //QUERY TERHUBUNG
        if ($update) {
            echo "<script>
            setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Password Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = 'page_info.html'; 
            });
            }, 200);
        </script>";
        //Akhir QUERY TERHUBUNG
        }else 
        
        //QUERY GAGAL
        {
            echo "<script>
            setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Password Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = 'page_warning_pass.html'; 
            });
            }, 200);
        </script>";

        //Akhir QUERY GAGAL
        }

        }
    }
}else{
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Password Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = 'page_warning_pass.html'; 
            });
            }, 200);
        </script>";
    }
?>