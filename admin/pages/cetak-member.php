<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../assets/images/icon.png"/>
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Member</title>
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
        <tr>
          <td width="15%"><img src="../../assets/images/logo.webp" alt="" style="width:80px;height:70px;"></div></td>
          <td width="80%">
          
    <h4><b>LAPORAN DATA MEMBER</b></h4>
    <h5><b>PO NPM PADANG</b></h5>
    <p>Jl. S. Parman, Flamboyan Baru, Kec. Padang Barat, Kota Padang / Alamat-email@gmail.com / Hp:0821-7008-9111</p>

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
 <center>Per Tanggal : <b><?php echo date('d F Y'); ?></b></center>
 <br>
  </div>

  <div style="width: 100%;float: left">
      <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Member</th>
                        <th>Nama Member</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aktif</th>
                        <th>Tanggal</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include '../../config/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_member");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_member']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                         <td><?php echo $q['jekel']; ?></td>
                          <td><?php echo $q['telp']; ?></td>
                          <td><?php echo $q['email']; ?></td>
                          <td><?php echo $q['password']; ?></td>
                          <td><?php echo $q['aktif']; ?></td>
                          <td><?php echo $q['tgl_daftar']; ?></td>
                        
                      </tr>

                  <?php } ?>
                    </tbody>
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
