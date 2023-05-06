<?php
    include '../koneksi.php';
    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST'){

    $UserID = $_POST["UserID"];
    $UserSKPD = $_POST["UserSKPD"];
    $UserNama = $_POST["UserNama"];
    $UserUsername = $_POST["UserUsername"];
    $UserPass = $_POST["UserPass"];
    $UserNoHP = $_POST["UserNoHP"];
    $UserEmail = $_POST["UserEmail"];

    if(isset($UserID) AND isset($UserSKPD) AND isset($UserNama) AND isset($UserUsername) AND isset($UserPass) AND 
      isset($UserNoHP) AND isset($UserEmail)){
        

        $cekID = mysqli_query($connect,"SELECT * from staf_pelaksana where pls_id = '$UserID'");

        if(mysqli_num_rows($cekID)==1){

          $user = mysqli_fetch_array($cekID);

            $pls_id =  $user['pls_id'];
            $skpd_id= $user['skpd_id'];
            $pls_nama = $user['pls_nama'];
            $pls_email= $user['pls_email'];
            $pls_nohp = $user['pls_nohp'];
            $pls_username = $user['pls_username'];
            $pls_password = $user['pls_password'];

         if($UserID==$pls_id AND $UserSKPD==$skpd_id AND $UserNama==$pls_nama AND $UserUsername==$pls_username AND
            $UserPass==$pls_password AND $UserNoHP==$pls_nohp AND $UserEmail==$pls_email){
               
               $cek_ID = mysqli_query($connect, "SELECT * FROM staf_pelaksana WHERE pls_id='$pls_id'");
               $userData = mysqli_fetch_array($cek_ID);

               $response['error']=false;
               $response['message']="Data Terdaftar!";

                $response['pls_id'] = $userData['pls_id'];
                $response['skpd_id'] = $userData['skpd_id'];
                $response['pls_nama'] = $userData['pls_nama'];
                $response['pls_email'] = $userData['pls_email'];
                $response['pls_nohp'] = $userData['pls_nohp'];
                $response['pls_username'] = $userData['pls_username'];
                $response['pls_password'] = $user['pls_password'];

                $data_skpd = $userData['skpd_id'];
                
                $skpd_cek=mysqli_query($connect,"SELECT * FROM skpd WHERE skpd_id='$data_skpd'");
                $skpd = mysqli_fetch_array($skpd_cek);
                $response['skpd_nama'] = $skpd['skpd_nama'];

      }else{
        $response['error']=true;
        $response['message']="Oops! Terjadi Perubahan Data,Silahkan Login Ulang!";
      }

    //IF CEK ID SALAH 
        }else{
          $response['error']=true;
          $response['message']="Oops! Data Tidak Terdaftar!";
        }

    //IF DATA TIDAK ISSET
    }else{
      $response['error']=true;
      $response['message']="Data Tidak Ada!";
    }


    //PENUTUP SERVER POST
    }

    echo json_encode($response);
?>