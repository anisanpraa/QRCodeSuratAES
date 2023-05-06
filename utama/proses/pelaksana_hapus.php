<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php 
// koneksi database
include '../../koneksi.php';
 
$pls_id = $_GET['pls_id'];

$hapus = mysqli_query($connect,"DELETE FROM staf_pelaksana where pls_id='$pls_id'");
 
// mengalihkan halaman kembali ke halaman skpd
if($hapus){
echo "<script>
      setTimeout(function() {
            swal({
                title: 'Success!',
                text: 'Data Berhasil di Hapus!',
                type: 'success'
            }, function() {
                window.location.href = '../pelaksana.php'; 
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
                window.location.href = '../pelaksana.php'; 
            });
    }, 200);
</script>";
}
?>