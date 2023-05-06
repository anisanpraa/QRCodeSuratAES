<?php

	include '../../koneksi.php';

	 // fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");      
    // membuat nama file ekspor "data-anggota.xls"
    header("Content-Disposition: attachment; filename=Data Surat.xls"); 


?>

	 <table border="1">
        <thead>
               <tr>
                   <th>No</th>
                   <th>ID Surat</th>
                   <th>Nomor Surat</th>
                   <th>Nama Unit</th>
                   <th>Perihal Surat</th>
                   <th>Tanggal Surat</th>
                   <th>Nama Pejabat</th>
                </tr>
       	</thead>
                                 	
        <tbody>
            <?php
        		$no = 1;
        		$sql = mysqli_query($connect,"SELECT id_surat,surat_nomor,unit_nama,surat_perihal,surat_tgl_buat,surat_ttd_pejabat,qrcode FROM surat INNER JOIN unit_kerja ON surat.unit_id=unit_kerja.unit_id;");
                                        while($surat = mysqli_fetch_array($sql)){
      		?>

      			<tr>
      				<td>
      					<div class="mrg-top-18">
                        <b class="text-dark font-size-16"><?php echo $no++; ?></b>
                    </div></td>

                    <td><div class="mrg-top-18">
                        <span class="text-dark"><?php echo $surat['id_surat']; ?></span>
                    </div></td> 

                    <td><div class="mrg-top-18">
                        <span class="text-dark"><?php echo $surat['surat_nomor']; ?></span>
                    </div></td>                                        

                    <td><div class="mrg-top-18">
                       	<span class="text-dark"><?php echo $surat['unit_nama']; ?></span>
                    </div></td>

                    <td><div class="mrg-top-18">
                        <span class="text-dark"><?php echo $surat['surat_perihal']; ?></span>
                    </div></td>

                    <td><div class="mrg-top-18">
                        <span class="text-dark"><?php echo $surat['surat_tgl_buat']; ?></span>
                    </div></td>

                    <td><div class="mrg-top-18">
                        <span class="text-dark"><?php echo $surat['surat_ttd_pejabat']; ?></span>
                   	</div></td>                
      			</tr>

        		<?php } ?>

</tbody>
</table>