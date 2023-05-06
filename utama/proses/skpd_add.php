<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";

if(isset($_POST["submit"])){

  $skpd_id = $_POST["skpd_id"];
  $skpd_nama = $_POST["skpd_nama"];
  $skpd_tlp = $_POST["skpd_tlp"];
  $skpd_email = $_POST["skpd_email"];
  $skpd_alamat = $_POST["skpd_alamat"];
  $skpd_pimpinan = $_POST["skpd_pimpinan"];


  if(!empty($skpd_email)){

  if (!filter_var($skpd_email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        setTimeout(function() {
            swal({
                title: 'Oopss!',
                text: 'Data Gagal di Submit! Email Tidak Valid!',
                type: 'error'
            }, function() {
                window.location.href = '../skpd_tambah.php'; 
            });
      }, 200);
      </script>";
}

else {

  $add = "INSERT INTO skpd(skpd_id,skpd_nama,skpd_tlp,skpd_email,skpd_alamat,skpd_pimpinan) VALUES ('$skpd_id','$skpd_nama','$skpd_tlp', '$skpd_email', '$skpd_alamat', '$skpd_pimpinan')";
  
  if ($connect->multi_query($add) == TRUE) {
    echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Tambahkan!',
                type: 'success'
            }, function() {
                window.location.href = '../skpd.php'; 
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
                window.location.href = '../skpd_tambah.php'; 
            });
    }, 200);
</script>";
      }
    }
  }

else {
  $add = "INSERT INTO skpd(skpd_id,skpd_nama,skpd_tlp,skpd_email,skpd_alamat,skpd_pimpinan) VALUES ('$skpd_id','$skpd_nama','$skpd_tlp', '$skpd_email', '$skpd_alamat', '$skpd_pimpinan')";
  
  if ($connect->multi_query($add) == TRUE) {
    echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Tambahkan!',
                type: 'success'
            }, function() {
                window.location.href = '../skpd.php'; 
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
                window.location.href = '../skpd_tambah.php'; 
            });
    }, 200);
</script>";
    }
  }
}

?>