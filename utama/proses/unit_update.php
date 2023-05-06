<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";

  $unit_id = $_POST["unit_id"];
  $skpd_id = $_POST["skpd_id"];
  $unit_nama = $_POST["unit_nama"];

  $update = mysqli_query($connect,"UPDATE unit_kerja SET skpd_id='$skpd_id', unit_nama='$unit_nama' where unit_id='$unit_id'");
  
  if ($update){
    echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Update!',
                type: 'success'
            }, function() {
                window.location.href = '../ukerja.php'; 
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
                window.location.href = '../ukerja.php'; 
            });
    }, 200);
</script>";
   }

?>