<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";
include"../../AES.php";
include"../../phpqrcode/qrlib.php";


  $kunci = "EnkripsiDekripsi";
    $id_surat = $_POST["id_surat"];
      $surat_nomor = $_POST["surat_nomor"];
      $surat_nomor_lama = $_POST["surat_nomor_lama"];
      $unit_id = $_POST["unit_id"];
      $surat_perihal = $_POST["surat_perihal"];
      $surat_tgl_buat = $_POST["surat_tgl_buat"];
      $surat_ttd_pejabat = $_POST["surat_ttd_pejabat"];
      $qrcode = $_POST["qrcode"];
      $enkrip = $_POST["enkrip"];

    //Jika Nomor Surat Sama
    if ($surat_nomor == $surat_nomor_lama) {

    date_default_timezone_set('Asia/Jakarta');
    $date_now=date("Y-m-d H:i:s");

    if($surat_tgl_buat>$date_now){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Silahkan Cek Tanggal Surat!',
                type: 'error'
            }, function() {
                window.location.href = '../surat.php'; 
            });
      }, 200);
      </script>";
    }else{
      
      $update = mysqli_query($connect,"UPDATE surat SET surat_nomor='$surat_nomor', unit_id='$unit_id', surat_perihal='$surat_perihal', surat_tgl_buat='$surat_tgl_buat', surat_ttd_pejabat='$surat_ttd_pejabat', qrcode='$qrcode', enkrip='$enkrip' where id_surat='$id_surat'");
      
        //QUERY TERHUBUNG
        if ($update) {
          echo "<script>
          setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../surat.php'; 
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
                window.location.href = '../surat.php'; 
            });
            }, 200);
            </script>";
    //Akhir QUERY GAGAL
        }
      }
    //Akhir Kondisi Jika Nomor Surat Sama
    }

    else

    //JIKA NOMOR SURAT BERBEDA
    {

      $cek = mysqli_query($connect, "SELECT surat_nomor from surat where surat_nomor = '$surat_nomor'");
      $nomorsurat = mysqli_num_rows($cek);
    
      //Kondisi Salah
      if($nomorsurat == 1){
          echo "<script>
            setTimeout(function() {
              swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Nomor Surat Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../surat.php'; 
            });
          }, 200);
          </script>";
      //Akhir Kondisi Salah
      }

      else

      //Kondisi Benar
      {

      date_default_timezone_set('Asia/Jakarta');
      $date_now=date("Y-m-d H:i:s");

      if($surat_tgl_buat>$date_now){
        echo "<script>
          setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Silahkan Cek Tanggal Surat!',
                type: 'error'
            }, function() {
                window.location.href = '../surat.php'; 
            });
        }, 200);
        </script>";
      }else{

      $image_dulu = '../../qrcode/'.$qrcode;
      @unlink ("$image_dulu");
      
      $aes = new AES($kunci);
      $enkrip_update = bin2hex($aes->encrypt($surat_nomor));

      $folderTemp = '../../qrcode/';
      $data_qr = $enkrip_update;
      $nama_qr = $id_surat."-".date('dmY');
      $qrcode_baru = $nama_qr.".png";
      $kual = 'H';
      $ukuran =4;
      $padding = 0;
      QRCode :: png($data_qr,$folderTemp.$qrcode_baru,$kual,$ukuran,$padding);

      $update = mysqli_query($connect,"UPDATE surat SET surat_nomor='$surat_nomor', unit_id='$unit_id', surat_perihal='$surat_perihal', surat_tgl_buat='$surat_tgl_buat', surat_ttd_pejabat='$surat_ttd_pejabat', qrcode='$qrcode_baru', enkrip='$enkrip_update' where id_surat='$id_surat'");
      
        //QUERY TERHUBUNG
        if ($update) {
          echo "<script>
          setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../surat.php'; 
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
                window.location.href = '../surat.php'; 
            });
            }, 200);
            </script>";
    //Akhir QUERY GAGAL
        }

      //Akhir Kondisi Benar
      }
    }
    //AKHIR KONDISI NOMOR SURAT BERBEDA
    }

?>
