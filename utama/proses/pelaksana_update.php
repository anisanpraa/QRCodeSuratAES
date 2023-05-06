<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";

  $pls_id = $_POST["pls_id"];
  $skpd_id = $_POST["skpd_id"];
  $pls_nama = $_POST["pls_nama"];
  $pls_email = $_POST["pls_email"];
  $pls_nohp = $_POST["pls_nohp"];
  $pls_username = $_POST["pls_username"];
  $pls_password = $_POST["pls_password"];

  $username_lama = $_POST["username_lama"];
  $email_lama = $_POST["email_lama"];
  $skpd_lama = $_POST["skpd_lama"];

  $uppercase = preg_match('@[A-Z]@', $pls_password);
  $lowercase = preg_match('@[a-z]@', $pls_password);
  $number    = preg_match('@[0-9]@', $pls_password);


//CEK Ketersediaan Data SKPD
if($skpd_id == $skpd_lama){

  //CEK Ketersediaan Email
  if($pls_email == $email_lama){

  //Validasi Email
  if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
//Akhir Validasi Email Salah
}

//Validasi Email Benar
else {

  //CEK USERNAME
  if($pls_username == $username_lama){
 
   //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{

  //Kondisi Password Salah
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

    //Kondisi Password Benar
    else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }
  }
//Akhir Validasi Username
}

  //VALIDASI USERNAME BERBEDA
  else {

    $cek = mysqli_query($connect, "SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");
    $usernamedata = mysqli_num_rows($cek);
    
    //Kondisi Salah
    if($usernamedata == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Username Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Salah
  }
  else

  //Kondisi Benar
  {

  //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{

  //Validasi Password
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

  //VALIDASI PASSWORD BENAR
  else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }

    //AKHIR KONDISI PASSWORD SALAH
    }
  }
  //AKHIR KONDISI USERNAME BERBEDA BENAR
  }

//AKHIR VALIDASI USERNAME BERBEDA
}
    //Akhir Email Benar
    }

}//Akhir Ketersediaan Email (Kondisi True)

//CEK Ketersediaan Email (Kondisi False)
else{
    $cek_email = mysqli_query($connect, "SELECT pls_email from staf_pelaksana where pls_email = '$pls_email'");
    $userEmail = mysqli_num_rows($cek_email);
    
    //Kondisi True
    if($userEmail == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Email Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi True
  }else{

    //Kondisi Salah

    //Validasi Email
  if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
//Akhir Validasi Email Salah
}

//Validasi Email Benar
else {

  //CEK USERNAME
  if($pls_username == $username_lama){
 
  //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{
  //Kondisi Password Salah
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

    //Kondisi Password Benar
    else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }
}
  //Akhir Validasi Username
  }


  //VALIDASI USERNAME BERBEDA
  else {

    $cek = mysqli_query($connect, "SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");
    $usernamedata = mysqli_num_rows($cek);
    
    //Kondisi Salah
    if($usernamedata == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Username Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Salah
  }
  else

  //Kondisi Benar
  {

   //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{
  //Validasi Password
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

  //VALIDASI PASSWORD BENAR
  else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

        //Akhir QUERY GAGAL
        }
      //AKHIR KONDISI PASSWORD SALAH
     }
    //AKHIR KONDISI USERNAME BERBEDA BENAR
    }
  }
  //AKHIR VALIDASI USERNAME BERBEDA
  }
    //Akhir Email Benar
    }
  }//Akhir Kondisi Salah
  }
}else{

//CEK Ketersediaan Data SKPD

$cek_skpd = mysqli_query($connect, "SELECT skpd_id from staf_pelaksana where skpd_id = '$skpd_id'");
$dskpd = mysqli_num_rows($cek_skpd);

if($dskpd==1){
   echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Akun SKPD sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{

  //CEK Ketersediaan Email
  if($pls_email == $email_lama){

  //Validasi Email
  if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
//Akhir Validasi Email Salah
}

//Validasi Email Benar
else {

  //CEK USERNAME
  if($pls_username == $username_lama){
 
   //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{

  //Kondisi Password Salah
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

    //Kondisi Password Benar
    else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }
  }
//Akhir Validasi Username
}

  //VALIDASI USERNAME BERBEDA
  else {

    $cek = mysqli_query($connect, "SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");
    $usernamedata = mysqli_num_rows($cek);
    
    //Kondisi Salah
    if($usernamedata == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Username Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Salah
  }
  else

  //Kondisi Benar
  {

  //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{

  //Validasi Password
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

  //VALIDASI PASSWORD BENAR
  else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }

    //AKHIR KONDISI PASSWORD SALAH
    }
  }
  //AKHIR KONDISI USERNAME BERBEDA BENAR
  }

//AKHIR VALIDASI USERNAME BERBEDA
}
    //Akhir Email Benar
    }

}//Akhir Ketersediaan Email (Kondisi True)

//CEK Ketersediaan Email (Kondisi False)
else{
    $cek_email = mysqli_query($connect, "SELECT pls_email from staf_pelaksana where pls_email = '$pls_email'");
    $userEmail = mysqli_num_rows($cek_email);
    
    //Kondisi True
    if($userEmail == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Email Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi True
  }else{

    //Kondisi Salah

    //Validasi Email
  if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
//Akhir Validasi Email Salah
}

//Validasi Email Benar
else {

  //CEK USERNAME
  if($pls_username == $username_lama){
 
  //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{
  //Kondisi Password Salah
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

    //Kondisi Password Benar
    else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }
}
  //Akhir Validasi Username
  }


  //VALIDASI USERNAME BERBEDA
  else {

    $cek = mysqli_query($connect, "SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");
    $usernamedata = mysqli_num_rows($cek);
    
    //Kondisi Salah
    if($usernamedata == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Username Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Salah
  }
  else

  //Kondisi Benar
  {

   //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  }else{
  //Validasi Password
  if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

  //VALIDASI PASSWORD BENAR
  else {

    $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
      //QUERY TERHUBUNG
      if ($update) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
        }, 200);
        </script>";
      //Akhir QUERY TERHUBUNG
      } 
      else 
      //QUERY GAGAL
      {
         echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana.php'; 
            });
          }, 200);
          </script>";

        //Akhir QUERY GAGAL
        }
      //AKHIR KONDISI PASSWORD SALAH
     }
    //AKHIR KONDISI USERNAME BERBEDA BENAR
    }
  }
  //AKHIR VALIDASI USERNAME BERBEDA
  }
    //Akhir Email Benar
    }
  }//Akhir Kondisi Salah
  }
}
}
?>