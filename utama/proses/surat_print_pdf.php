<!DOCTYPE html>
<html>
<head><title>Data Surat Dinas (Enkripsi AES dan QR-Code)</title></head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
<center>
        <h1>Surat Dinas Bupati Kuningan</h1>
        <h2>Data Surat Dinas</h2>
</center><br>

  <table>
  <tr> 
      <th>NO</th>
      <th>ID Data Surat</th>
      <th>Nomor Surat</th>
      <th>Nama Unit</th>
      <th>Perihal Surat</th>
      <th>Tanggal Surat</th>
      <th>Nama Pejabat</th>
      <th>QR-Code</th>
 </tr>
 <?php 
  include "../../koneksi.php";

        $no = 1;
        $sql = mysqli_query($connect,"SELECT id_surat,surat_nomor,unit_nama,surat_perihal,surat_tgl_buat,surat_ttd_pejabat,qrcode FROM surat INNER JOIN unit_kerja ON surat.unit_id=unit_kerja.unit_id;");
        while($data = mysqli_fetch_array($sql)){
      ?>
 <tr>
            <td style='text-align: center;'><?php echo $no++; ?></td>
            <td><?php echo $data['id_surat']; ?></td>
            <td><?php echo $data['surat_nomor']; ?></td>
            <td><?php echo $data['unit_nama']; ?></td>
            <td><?php echo $data['surat_perihal']; ?></td>
            <td><?php echo $data['surat_tgl_buat']?></td>
            <td><?php echo $data['surat_ttd_pejabat']; ?></td>
            <td><?php echo "<img class='profile-img img-fluid'  src='../../qrcode/$data[qrcode]' width='50' >"?></td>
 </tr>
 <?php 
 }
 ?>
    </table>
    <script>
 window.print();
 </script>
</body>
</html>

