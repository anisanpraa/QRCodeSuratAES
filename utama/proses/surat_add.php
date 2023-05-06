<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";
include"../../AES.php";
include"../../phpqrcode/qrlib.php";

//Jika Tombol Submit Di Tekan
if(isset($_POST["submit"])){

      $id_surat = $_POST["id_surat"];
    $surat_nomor = $_POST["surat_nomor"];
    $unit_id = $_POST["unit_id"];
    $surat_perihal = $_POST["surat_perihal"];
    $surat_tgl_buat = $_POST["surat_tgl_buat"];
    $surat_ttd_pejabat = $_POST["surat_ttd_pejabat"];

    $cek = mysqli_query($connect, "SELECT surat_nomor from surat where surat_nomor = '$surat_nomor'");
    $nosurat = mysqli_num_rows($cek);

    //Cek Nomor Surat
    if($nosurat == 1){
      echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Nomor Surat Sudah Ada!',
                type: 'error'
            }, function() {
                window.location.href = '../surat_tambah.php'; 
            });
      }, 200);
      </script>";
    //Akhir Kondisi  Salah
    }

    //Konidisi Benar
    else {

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
                window.location.href = '../surat_tambah.php'; 
            });
      }, 200);
      </script>";
    }else{

    $kunci = "EnkripsiDekripsi";
    $aes = new AES($kunci);
    $enkrip = bin2hex($aes->encrypt($surat_nomor));

    $folderTemp = '../../qrcode/';
    $data_qr = $enkrip;
    $nama_qr = $id_surat."-".date('dmY');
    $qrcode = $nama_qr.".png";
    $kual = 'H';
    $ukuran =4;
    $padding = 0;
    QRCode :: png($data_qr,$folderTemp.$qrcode,$kual,$ukuran,$padding);

    $add = "INSERT INTO surat(id_surat,surat_nomor,unit_id,surat_perihal,surat_tgl_buat,surat_ttd_pejabat,qrcode,enkrip) VALUES ('$id_surat','$surat_nomor','$unit_id','$surat_perihal','$surat_tgl_buat','$surat_ttd_pejabat','$qrcode','$enkrip')";

     if ($connect->multi_query($add) == TRUE) {
      echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Tambahkan!',
                type: 'success'
            }, function() {
                window.location.href = '../surat.php'; 
            });
    }, 200);
</script>";

} else {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! ID Sudah digunakan!',
                type: 'error'
            }, function() {
                window.location.href = '../surat_tambah.php'; 
            });
    }, 200);
</script>";
      }
   //Akhir Kondisi Benar (Duplikat Data)
  }
}
  //AKhir Kondisi Submit
    }

?>


