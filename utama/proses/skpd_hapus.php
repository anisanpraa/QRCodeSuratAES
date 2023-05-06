<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php 
// koneksi database
include '../../koneksi.php';
 
$skpd_id = $_GET['skpd_id'];

$hapus = mysqli_query($connect,"DELETE FROM skpd where skpd_id='$skpd_id'");
 
// mengalihkan halaman kembali ke halaman skpd
if($hapus){
echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Hapus!',
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
                text: 'Data Gagal di Hapus! Data Berelasi dengan Tabel lain!',
                type: 'error'
            }, function() {
                window.location.href = '../skpd.php'; 
            });
    }, 200);
</script>";
}
?>