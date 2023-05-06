<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php 
// koneksi database
include '../../koneksi.php';
 
$unit_id= $_GET['unit_id'];

$hapus = mysqli_query($connect,"DELETE FROM unit_kerja where unit_id='$unit_id'");
 
// mengalihkan halaman kembali ke halaman unit kerja
if($hapus){
echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Hapus!',
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
                text: 'Data Gagal di Hapus! Data Berelasi dengan Tabel lain!',
                type: 'error'
            }, function() {
                window.location.href = '../ukerja.php'; 
            });
    }, 200);
</script>";
}
?>