<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";

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
                window.location.href = '../skpd.php'; 
            });
      }, 200);
      </script>";
}

else {

  $update = mysqli_query($connect,"UPDATE skpd SET skpd_nama='$skpd_nama', skpd_tlp='$skpd_tlp', skpd_email='$skpd_email', skpd_alamat='$skpd_alamat' , skpd_pimpinan='$skpd_pimpinan' where skpd_id='$skpd_id'");
  
  if ($update){
    echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
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
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../skpd.php'; 
            });
    }, 200);
</script>";
   }
  }
}

else {
  $update = mysqli_query($connect,"UPDATE skpd SET skpd_nama='$skpd_nama', skpd_tlp='$skpd_tlp', skpd_email='$skpd_email', skpd_alamat='$skpd_alamat' , skpd_pimpinan='$skpd_pimpinan' where skpd_id='$skpd_id'");
  
  if ($update){
    echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
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
                text: 'Data Gagal di Update!',
                type: 'error'
            }, function() {
                window.location.href = '../skpd.php'; 
            });
    }, 200);
</script>";

  }
}
?>