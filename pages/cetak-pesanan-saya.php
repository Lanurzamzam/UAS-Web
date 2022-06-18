<?php ob_start(); ?>

<style type="text/css">
  table {
    border-collapse: collapse;
    padding-left: 3px;

}

 table {
    border-collapse: collapse;
    padding-left: 3px;

}

table, th, td {
    border-bottom: 1px solid #555;
}
th, td {
    padding: 8px;
    text-align: left;
   
}
h3{
  margin-bottom: 1px;
  margin-top: 1px;
}
p{
  margin-bottom: 1px;
  margin-top: 1px;
}
</style>

<body style="font-size: 12px;">
<img src="../assets/images/logo.webp" alt="" width="65" height="50">
<h3 style="text-align: center; font-size: 16px;">BUKTI PEMESANAN TIKET</h3>
<h3 style="text-align: center; font-size: 13px;">PO NPM PADANG</h3>
<p style="text-align: center;"> Jl. S. Parman, Flamboyan Baru, Kec. Padang Barat, Kota Padang / Alamat-email@gmail.com / Hp:0821-7008-9111</p>

<hr>
<br>
                     <?php

include "../config/koneksi.php";
include '../config/helper.php';

 $nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$id=$_GET['kd'];

		$sql1=mysqli_query($koneksi,"SELECT a.jml_kursi as jk,a.*,b.*,c.*,d.* FROM tb_pesan a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_tujuan c ON c.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal d ON b.kd_jadwal=d.kd_jadwal WHERE a.kd_pesan='$id'");	 	
		$no=0;
	$q = mysqli_fetch_array($sql1);


?>
<p><b># Kode : </b> <span style="color: red;"><?php echo $q['kd_pesan']; ?></span></p>
<p><b># Tujuan : </b> <?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></p>
<p><b># Tanggal Berangkat : </b> <?php echo tgl_lokal($q['tgl_berangkat'],true); ?></p>
<p><b># Jam Berangkat : </b> <?php echo date('H:i a',strtotime($q['jadwal'])); ?></p>
<br>
<hr>
<table class="table table-hover">
                      
                      <tr>
                        <th width="100">KD TIKET</th>
                        <th width="100">TITEL</th>
                        <th width="190">NAMA PENUMPANG</th>
                         <th width="100">NO KURSI</th>
                        <th width="100">NO TELEPON</th>
                      </tr>
                     <?php



$id=$_GET['kd'];

		$sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_kursi b ON a.kd_kursi=b.kd_kursi WHERE a.kd_pesan='$id'");	 	
		$no=0;
		while($tampil = mysqli_fetch_array($sql)) {

?>
                    	<tr>
                        <td width="50"><?php echo $tampil['kd_tiket']; ?> </td>
                        <td width="50"><?php echo $tampil['title']; ?> </td>
                        <td width="100"><?php echo $tampil['nm_penumpang']; ?> </td>
                        <td width="50"><b><?php echo $tampil['no_kursi']; ?></b></td>
                        <td width="80"><?php echo $tampil['telp']; ?> </td>
                       </tr>
                       <?php } ?>
                    </table>
                      <br>

<i>* Syarat dan ketentuan berlaku untuk tiket ini.</i><br>
<i>* Harap lakukan checkout 1 Jam Sebelum Keberangkatan.</i>


             
                    </body>
                    <?php
$html =ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Bukti_pemesanan.pdf', 'D');
?>
                  

