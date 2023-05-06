<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
include"../../koneksi.php";

if(isset($_POST["submit"])){

  $unit_id = $_POST["unit_id"];
  $skpd_id = $_POST["skpd_id"];
  $unit_nama = $_POST["unit_nama"];

  $add = "INSERT INTO unit_kerja(unit_id,skpd_id,unit_nama) VALUES ('$unit_id','$skpd_id','$unit_nama')";
  
  if ($connect->multi_query($add) == TRUE) {
    echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Tambahkan!',
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
                text: 'Data Gagal di Submit! ID Sudah digunakan!',
                type: 'error'
            }, function() {
                window.location.href = '../unit_tambah.php'; 
            });
    }, 200);
</script>";
      }
    }

?>