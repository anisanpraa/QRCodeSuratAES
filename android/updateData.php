<?php
include '../koneksi.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $pls_id = $_POST["pls_id"];
    $skpd_id = $_POST["skpd_id"];
    $pls_nama = $_POST["pls_nama"];
    $pls_email = $_POST["pls_email"];
    $pls_nohp = $_POST["pls_nohp"];
    $pls_username = $_POST["pls_username"];
    $pls_password = $_POST["pls_password"];

    $username_lama = $_POST["username_lama"];
    $email_lama = $_POST["email_lama"];

    $uppercase = preg_match('@[A-Z]@', $pls_password);
    $lowercase = preg_match('@[a-z]@', $pls_password);
    $number    = preg_match('@[0-9]@', $pls_password);


  //CEK KETERSEDIAN EMAIL (Kondisi True)
  if($pls_email == $email_lama){
 
     //Validasi Email
     if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
      $response['error']=true;
      $response['message']="Email Tidak Valid!";
     //Akhir Validasi Email Salah
     }

     //Validasi Email Benar
     else {

      //CEK USERNAME
      if($pls_username == $username_lama){

        //Kondisi Password Salah
        if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
          $response['error']=true;
        $response['message']="Invalid Password!MIN 6 karakter(Ada huruf BESAR, huruf kecil dan angka)!";
        //Akhir Kondisi Password Salah
        }

    //Kondisi Password Benar
    else {
      
        //QUERY TERHUBUNG

       $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");

        if ($update) {
          $response['error']=false;
          $response['message']="Update Data Berhasil!";

          //Mencari User Berdasarkan ID 
          $query_user = mysqli_query($connect,"SELECT * FROM staf_pelaksana WHERE pls_id = '$pls_id'");
          $user = mysqli_fetch_array($query_user);

          $response['pls_id'] = $user['pls_id'];
          $response['skpd_id'] = $user['skpd_id'];
          $response['pls_nama'] = $user['pls_nama'];
          $response['pls_email'] = $user['pls_email'];
          $response['pls_nohp'] = $user['pls_nohp'];
          $response['pls_username'] = $user['pls_username'];
          $response['pls_password'] = $user['pls_password'];
        //Akhir QUERY TERHUBUNG
        } 
        else 
        //QUERY GAGAL
        {
          $response['error']=true;
          $response['message']="Ups!Update Data Gagal!";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }

  //Akhir Validasi Username
  }


  //VALIDASI USERNAME BERBEDA
  else {    
    //Kondisi Salah

    //Cek Username
    $cek_username = mysqli_query($connect,"SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");
    if(mysqli_num_rows($cek_username)==1){
        $response['error']=true;
        $response['message']="Ups,Gagal!Username Sudah Ada!";
    //Akhir Kondisi Salah
    }else{

        if(strlen($pls_username)<6){
          $response['error']=true;
          $response['message']="Username Min 6 karakter!";
        }else{

           //Validasi Password
             if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
                   $response['error']=true;
                   $response['message']="Invalid Password!MIN 6 karakter(Ada huruf BESAR, huruf kecil dan angka)!";
               //Akhir Kondisi Password Salah
               }else{
         
                $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
                 
                 //QUERY TERHUBUNG
                 if ($update) {
                     $response['error']=false;
                     $response['message']="Update Data Berhasil!";

                     //Mencari User Berdasarkan ID 
                      $query_user = mysqli_query($connect,"SELECT * FROM staf_pelaksana WHERE pls_id = '$pls_id'");
                      $user = mysqli_fetch_array($query_user);

                       $response['pls_id'] = $user['pls_id'];
                       $response['skpd_id'] = $user['skpd_id'];
                       $response['pls_nama'] = $user['pls_nama'];
                       $response['pls_email'] = $user['pls_email'];
                       $response['pls_nohp'] = $user['pls_nohp'];
                       $response['pls_username'] = $user['pls_username'];
                       $response['pls_password'] = $user['pls_password'];
         
                   }else{ 
                       //QUERY GAGAL
                          $response['error']=true;
                          $response['message']="Ups!Update Data Gagal!";
                        }

        //AKHIR KONDISI PASSWORD SALAH
          }
        }
      }
    //AKHIR VALIDASI USERNAME BERBEDA
    }
    //Akhir Email Benar
  }
}//Akhir Cek Ketersediaan Email (True)

  //Cek Ketersediaan Email (False)
  else{

    //Cek Email
    $cek_email = mysqli_query($connect,"SELECT pls_email from staf_pelaksana where pls_email = '$pls_email'");

      if(mysqli_num_rows($cek_email)==1){
        $response['error']=true;
        $response['message']="Ups,Gagal!Email Sudah Ada!";
    //Akhir Kondisi Salah
    }else{
      //Validasi Email
     if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
      $response['error']=true;
      $response['message']="Email Tidak Valid!";
     //Akhir Validasi Email Salah
     }

     //Validasi Email Benar
     else {

      //CEK USERNAME
      if($pls_username == $username_lama){
 

        //Kondisi Password Salah
        if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
          $response['error']=true;
        $response['message']="Invalid Password!MIN 6 karakter(Ada huruf BESAR, huruf kecil dan angka)!";
        //Akhir Kondisi Password Salah
        }

    //Kondisi Password Benar
    else {
        
        $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
        //QUERY TERHUBUNG
        if ($update) {
          $response['error']=false;
          $response['message']="Update Data Berhasil!";

          //Mencari User Berdasarkan ID 
              $query_user = mysqli_query($connect,"SELECT * FROM staf_pelaksana WHERE pls_id = '$pls_id'");
              $user = mysqli_fetch_array($query_user);

          $response['pls_id'] = $user['pls_id'];
          $response['skpd_id'] = $user['skpd_id'];
          $response['pls_nama'] = $user['pls_nama'];
          $response['pls_email'] = $user['pls_email'];
          $response['pls_nohp'] = $user['pls_nohp'];
          $response['pls_username'] = $user['pls_username'];
          $response['pls_password'] = $user['pls_password'];
        //Akhir QUERY TERHUBUNG
        } 
        else 
        //QUERY GAGAL
        {
          $response['error']=true;
          $response['message']="Ups!Update Data Gagal!";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }

  //Akhir Validasi Username
  }


  //VALIDASI USERNAME BERBEDA
  else {    
    //Kondisi Salah
    $cek_username = mysqli_query($connect,"SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");

    if(mysqli_num_rows($cek_username)==1){
        $response['error']=true;
        $response['message']="Ups,Gagal!Username Sudah Ada!";
    //Akhir Kondisi Salah
    }
    else

    //Kondisi Benar
    {

       if(strlen($pls_username)<6){
          $response['error']=true;
          $response['message']="Username Min 6 karakter!";
        }else{

        //Validasi Password
        if(!$uppercase || !$lowercase || !$number || strlen($pls_password)<6){
            $response['error']=true;
            $response['message']="Invalid Password!MIN 6 karakter(Ada huruf BESAR, huruf kecil dan angka)!";
        //Akhir Kondisi Password Salah
        }

        //VALIDASI PASSWORD BENAR
        else{
      
          $update = mysqli_query($connect,"UPDATE staf_pelaksana SET skpd_id='$skpd_id', pls_nama='$pls_nama', pls_email='$pls_email', pls_nohp='$pls_nohp', pls_username='$pls_username', pls_password='$pls_password' where pls_id='$pls_id'");
      
            //QUERY TERHUBUNG
            if ($update){
              $response['error']=false;
              $response['message']="Update Data Berhasil!";

             //Mencari User Berdasarkan ID 
              $query_user = mysqli_query($connect,"SELECT * FROM staf_pelaksana WHERE pls_id = '$pls_id'");
              $user = mysqli_fetch_array($query_user);

              $response['pls_id'] = $user['pls_id'];
              $response['skpd_id'] = $user['skpd_id'];
              $response['pls_nama'] = $user['pls_nama'];
              $response['pls_email'] = $user['pls_email'];
              $response['pls_nohp'] = $user['pls_nohp'];
              $response['pls_username'] = $user['pls_username'];
              $response['pls_password'] = $user['pls_password'];
              //Akhir QUERY TERHUBUNG
            }else{
              $response['error']=true;
              $response['message']="Ups!Update Data Gagal!";
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
    }
  }
}
echo json_encode($response);
?>