<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>


<?php
include"../../koneksi.php";


//Jika Tombol Submit Di Tekan
if(isset($_POST["submit"])){

  $pls_id = $_POST["pls_id"];
  $skpd_id = $_POST["skpd_id"];
  $pls_nama = $_POST["pls_nama"];
  $pls_email = $_POST["pls_email"];
  $pls_nohp = $_POST["pls_nohp"];
  $pls_username = $_POST["pls_username"];
  $pls_password = $_POST["pls_password"];

  $uppercase = preg_match('@[A-Z]@', $pls_password);
  $lowercase = preg_match('@[a-z]@', $pls_password);
  $number    = preg_match('@[0-9]@', $pls_password);


  $cek_email = mysqli_query($connect, "SELECT pls_email from staf_pelaksana where pls_email = '$pls_email'");
  $emailuser = mysqli_num_rows($cek_email);

  $cek_skpd = mysqli_query($connect, "SELECT skpd_id from staf_pelaksana where skpd_id = '$skpd_id'");
  $dskpd = mysqli_num_rows($cek_skpd);

if($dskpd == 1){
  echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Akun SKPD sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana_tambah.php'; 
            });
      }, 200);
      </script>";
}else{
    //Cek Email Salah
    if($emailuser == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana_tambah.php'; 
            });
      }, 200);
      </script>";
    }else{

  //Validasi Email Salah
  if (!filter_var($pls_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana_tambah.php'; 
            });
      }, 200);
      </script>";
//Akhir Validasi Email Salah
}

//Validasi Email Benar
else {

  $cek = mysqli_query($connect, "SELECT pls_username from staf_pelaksana where pls_username = '$pls_username'");
  $usernamedata = mysqli_num_rows($cek);


    //Cek Username Salah
    if($usernamedata == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana_tambah.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Username Salah
  }

  //Kondisi Username Benar
  else { 

  //CEK PANJANG USERNAME
  if(strlen($pls_username)<6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana_tambah.php'; 
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
                window.location.href = '../pelaksana_tambah.php'; 
            });
      }, 200);
      </script>";
      //Akhir Kondisi Password Salah
    }//Kondisi Password Benar
      else {

      $add = "INSERT INTO staf_pelaksana(pls_id,skpd_id,pls_nama,pls_email,pls_nohp,pls_username,pls_password) VALUES ('$pls_id','$skpd_id','$pls_nama','$pls_email', '$pls_nohp', '$pls_username', '$pls_password')";
      
      //QUERY TERHUBUNG
      if ($connect->multi_query($add) == TRUE) {
       echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Tambahkan!',
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
                text: 'Data Gagal di Submit! ID Sudah digunakan!',
                type: 'error'
            }, function() {
                window.location.href = '../pelaksana_tambah.php'; 
            });
          }, 200);
          </script>";

      //Akhir QUERY GAGAL
      }
    //Akhir Kondisi Password Benar
    }

  //Akhir Username Benar
  }
}
    //Akhir Email Benar
    }
  }//Akhir Cek Ketersediaan Email
}
//Akhir Kondisi Tombol Submit
}

?>