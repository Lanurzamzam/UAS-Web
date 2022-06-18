<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../assets/images/icon.png"/>
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Pemesanan Tiket</title>
</head>

<style type="text/css" media="print">

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;

}
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;


}
</style>

<body onload="window.print();">
     <table>
                <td width="15%"><img src="../../assets/images/logo.webp" alt="" style="width:80px;height:70px;"></div></td>
          <td width="80%">
          
    <h4><b>LAPORAN PEMESANAN TIKET RENTANG</b></h4>
    <h5><b>PO NPM PADANG</b></h5>
    <p>Jl. S. Parman, Flamboyan Baru, Kec. Padang Barat, Kota Padang / Alamat-email@gmail.com / Hp:0821-7008-9111</p>

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
 <center>Rentang Tanggal : <b><?php echo date('d F Y',strtotime($_GET['tgl1'])); ?> - <?php echo date('d F Y',strtotime($_GET['tgl2'])); ?></b></center>
 <br>
  </div>

  <div style="width: 100%;float: left">
     <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Tiket</th>
                        <th>Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Nama Penumpang</th>
                        <th>Nomor Kursi</th>
                        <th>Telp</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       
                    include '../../config/koneksi.php'; 

                           if(!empty($_GET['tgl1'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and date(f.tgl_pesan) between '$_GET[tgl1]' and '$_GET[tgl2]' ORDER BY c.no_kursi ASC");

                            }else{
                              
                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' ORDER BY c.no_kursi ASC");
                            }


                      
                        
                        $no=0;$total=0;
                        $row=mysqli_num_rows($sql);

                  
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                        $total=$row*$q['harga'];

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_tiket']; ?></td>
                        <td><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_berangkat'])); ?>, <?php echo date("H:i a",strtotime($q['jadwal'])); ?></td>
                        
                        <td><?php echo $q['nm_penumpang']; ?></td>
                        <td><?php echo $q['no_kursi']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                     
                        <td>Rp <?php echo number_format($q['harga']); ?></td>
                    
                      </tr>

                  <?php } ?>
                    </tbody>
                    <tr>
                      <td colspan="5"></td>
                      <td><b><?php echo $row; ?> Tiket</b></td>
                      <td><b>Rp <?php echo number_format($total,0,".",".");  ?></b></td>
                      <td></td>
                       
                      </tr>
                  </table>
  </div>
<div class="ttd">
  Padang, <?php echo date("d F Y"); ?><br>
  Pimpinan

  <br>
  <br>
  <br>
 PO NPM PADANG
</div>
</body>
</html>
