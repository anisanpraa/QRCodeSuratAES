<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php 
include '../../koneksi.php';
session_start();

//menangkap posting dari field input form
$tu_id  = $_POST['tu_id'];
$foto_dulu = $_POST['foto_dulu'];
$tu_nama   = $_POST['tu_nama'];
$tu_email= $_POST['tu_email'];
$tu_nohp   = $_POST['tu_nohp'];
$tu_username = $_POST['tu_username'];
$tu_password = $_POST['tu_password'];
    
    $uppercase = preg_match('@[A-Z]@', $tu_password);
    $lowercase = preg_match('@[a-z]@', $tu_password);
    $number    = preg_match('@[0-9]@', $tu_password);

	$nama_file = $_FILES['tu_foto']['name'];
	$tmp = $_FILES['tu_foto']['tmp_name'];
	$namafolder="../foto/";
	$fotobaru = date('dmYHis')."-".$nama_file;
	$path = $namafolder.$fotobaru;
	$buat_foto = $foto_dulu;


if(strlen($tu_username)<=6){
     echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Username MIN 6 Karakter!',
                type: 'error'
            }, function() {
                window.location.href = '../tu_akun.php'; 
            });
      }, 200);
      </script>";
  }else{
    
    //Validasi Kondisi Email Salah
    if (!filter_var($tu_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../tu_akun.php'; 
            });
      }, 200);
      </script>";
}//Akhir Validasi Email Salah

//Validasi Kondisi Email Benar
else {

//Kondisi Password Salah
  if(!$uppercase || !$lowercase || !$number || strlen($tu_password)<6){
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Password Setidaknya 6 Karakter, terdapat huruf BESAR, huruf kecil dan angka!',
                type: 'error'
            }, function() {
                window.location.href = '../tu_akun.php'; 
            });
      }, 200);
      </script>";
  //Akhir Kondisi Password Salah
  }

  //Kondisi Password Benar
  else {

 //Validasi Penyimpanan File Foto Baru
if (!empty($tmp)){

    $jenis_gambar=$_FILES['tu_foto']['type']; //memeriksa format gambar


    //Validasi Format File SESUAI
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/png"){

        //Format Sesuai dan Kondisi Benar
        if (move_uploaded_file($tmp,$path)) {
    	   $d = '../foto/'.$buat_foto;
    	   @unlink ("$d");
            $query = mysqli_query($connect,"UPDATE staftu SET tu_foto='$fotobaru', tu_nama='$tu_nama', tu_email='$tu_email',tu_nohp='$tu_nohp' , tu_username='$tu_username', tu_password='$tu_password' where tu_id='$tu_id'");

            $cekDataBaru = mysqli_query($connect, "SELECT * from staftu where tu_id ='$tu_id'");
            $ambil = mysqli_fetch_assoc($cekDataBaru);
                    $_SESSION['tu_id'] = $ambil['tu_id'];
                    $_SESSION['tu_nama'] = $ambil['tu_nama'];
                    $_SESSION['tu_email'] = $ambil['tu_email'];
                    $_SESSION['tu_foto'] = $ambil['tu_foto'];
                    $_SESSION['tu_nohp'] = $ambil['tu_nohp'];
                    $_SESSION['tu_username'] = $ambil['tu_username'];
                    $_SESSION['tu_password'] = $ambil['tu_password'];

            echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Success!',
                        text: 'Data Berhasil di Update!',
                        type: 'success'
                    }, function() {
                        window.location.href = '../tu_akun.php'; 
                    });
                }, 200);
        </script>"; }

        //Format Sesuai, Namun Kondisi Salah
        else {
            echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Data Gagal di Update! File Gagal di Upload!',
                        type: 'error'
                    }, function() {
                         window.location.href = '../tu_akun.php'; 
                    });
                }, 200);
            </script>";  }

    //Akhir Validasi Format SESUAI
    }

    //Format Tidak Sesuai
    else {
        echo "<script>
            setTimeout(function() {
                swal({
                    title: 'Oopss!',
                    text: 'Data Gagal di Update! Format File Tidak Sesuai!',
                    type: 'error'
                }, function() {
                    window.location.href = '../tu_akun.php'; 
                });
            }, 200);
        </script>"; }  

//Akhir Validasi Penyimpanan File Foto Baru
} 

//Validasi Jika File Foto Lama
else {
    $query = mysqli_query($connect,"UPDATE staftu SET tu_foto='$buat_foto', tu_nama='$tu_nama', tu_email='$tu_email', tu_nohp='$tu_nohp' , tu_username='$tu_username', tu_password='$tu_password' where tu_id='$tu_id'");

    $cekDataBaru = mysqli_query($connect, "SELECT * from staftu where tu_id ='$tu_id'");
    $ambil = mysqli_fetch_assoc($cekDataBaru);
                    $_SESSION['tu_id'] = $ambil['tu_id'];
                    $_SESSION['tu_nama'] = $ambil['tu_nama'];
                    $_SESSION['tu_email'] = $ambil['tu_email'];
                    $_SESSION['tu_foto'] = $ambil['tu_foto'];
                    $_SESSION['tu_nohp'] = $ambil['tu_nohp'];
                    $_SESSION['tu_username'] = $ambil['tu_username'];
                    $_SESSION['tu_password'] = $ambil['tu_password'];

    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../tu_akun.php';
            });
    }, 200);
    </script>";  }  

    //Akhir Validasi Kondisi Password Benar
    }
//Akhir Validasi Email Benar
    }
}

?>