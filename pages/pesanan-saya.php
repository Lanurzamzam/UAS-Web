<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Pesanan Saya</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Pesan saya</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
          <div class="container">
                <div class="row sub_content">
                     <div class="eve-tab sidebar-tab">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Pesanan" data-toggle="tab">Pesanan</a></li>
                                    <li class=""><a href="#Transaksi" data-toggle="tab">Histori Pesanan</a></li>
                                </ul>

                                <div id="myTabContent" class="tab-content clearfix">
                                <div class="tab-pane fade active in" id="Pesanan">
                           <div class="table-responsive">
                    <table id="example1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Tiket</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                         include './config/helper.php';
                     $id=$_SESSION['us'];
                    
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT a.jml_kursi as jk,a.*,b.*,c.*,d.* FROM tb_pesan a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_tujuan c ON c.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal d ON b.kd_jadwal=d.kd_jadwal WHERE a.kd_member='$id' and a.status != 'Lunas' and a.status != 'Cancel' order by a.tgl_pesan desc");
                    $n=mysqli_num_rows($sql);

                    if($n=="0"){
                       echo'<tr>
                        <td colspan="8"><br>Anda tidak memiliki pesanan tiket, untuk tiket yang sukses dipesan silahkan lihat pada tabs histori pemesanan. <br></td></tr>';
                        }

                    while($q=mysqli_fetch_array($sql)){
                      $no++;
                      $kd=$q['kd_pesan'];
                      $stt=$q['status'];
                      $sub=$q['total'];
                      $kode=$q['kode'];
                      $total=$q['kode']+$q['total'];
                      $bts=$q['batas_waktu'];

                    if($q['jenis']=='Vip'){
                      $jenis="<span class='label label-warning'>Vip</span>";
                    }else{
                      $jenis="<span class='label label-success'>Ekonomis</span>";
                    }
                      
                      ?>
                      <tr>
                        <td><br><?php echo $no; ?> <br></td>
                        <td><br><?php echo $q['kd_pesan']; ?> <br></td>
                        <td><br><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?> <?php echo $jenis; ?><br></td>
                        <td><br><?php echo tgl_lokal($q['tgl_berangkat'],true); ?> <p></td>
                        <td><br><?php echo date('H:i a',strtotime($q['jadwal'])); ?><br></td>
                        <td><br><?php echo $q['jk']; ?> Tiket<br></td>
                        <td><br><?php if($stt=="Pending") echo "<span class='label label-info'>".$stt."</span>"; else echo "<span class='label label-warning'>".$stt."</span>"; ?> <br></td>

                        <?php if($stt=="Pending"){ ?>
                        <td><br><a href="./pages/cancel-pemesanan.php?&kd=<?php echo $kd; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin membatalkan pemesanan ini.?');"><i class="fa fa-close"></i></a></br></td>
                        <?php }else{ ?>
                    
                        <?php } ?>
                       </tr>

                      <?php } ?>
                      <?php if($n !=0){?>
                      <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>Sub Total</b></td> 
                         <td colspan="3" style="font-size: 14px;"><b> Rp <?php  echo number_format($sub,0,".",".");  ?></b></td> 
                      </tr>
                       <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>Kode Pembayaran</b></td> 
                         <td colspan="3" style="font-size: 12px;"><b><?php echo $kode; ?></b></td> 
                      </tr>
                      <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>Total Pembayaran</b></td> 
                         <td colspan="3" style="font-size: 16px;"><b>Rp <?php  echo number_format($total,0,".",".");  ?></b></td> 
                      </tr>
                      <?php if($stt=="Pending") { ?>
                      <tr>
                          <td colspan="7">Batas Pembayaran: 
                          <span style="color: #ea2c2c; font-weight: bold;"> 
                            <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $awal=date_create($bts);
                            $akhir=date_create();
                            $diff=date_diff($awal,$akhir);

                            echo $diff->h .' jam  ';
                            echo $diff->i .' menit. ';
                            ?>
                          </td>

                        </span>
                           
                         <td><a href="index.php?p=konfirmasi-pesan&kd=<?php echo $kd; ?>" class="btn btn-default btn-lg">Sudah Membayar</a></td> 
                      </tr>
                      <?php } } ?>
                     <tbody>
                    
                  </table>
                  <br>
                  <?php 
                 if($n !=0){
                  if($stt=="Pending") { ?>
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>  Silahkan lakukan transfer atau kirim lewat rekening bank kami dibawah ini dan pastikan mengirim dengan nomor rekening yang benar serta total bayar sesuai dengan yang ada diatas sampat 3 digit terakhir .</strong>
                                  </div>
                
                               <blockquote class='default' style="font-size: 16px;">
                               <i class="fa fa-credit-card"></i> Bank BRI
                               <hr style="border: 1px solid #1abc9c;">
                               <h3> a/n PO Npm Padang</h3>
                               <h2> 321-5624-253-891</h2>
                               </blockquote>
                   <?php } } ?>
                </div>
                   </div>  
                   <div class="tab-pane fade" id="Transaksi">
  <div class="table-responsive">
                      <table id="example1" class="table table-hover">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Tiket</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                      
                     $id=$_SESSION['us'];
                    
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT a.jml_kursi as jk,a.*,b.*,c.*,d.* FROM tb_pesan a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_tujuan c ON c.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal d ON b.kd_jadwal=d.kd_jadwal WHERE a.kd_member='$id' and a.status != 'Pengecekan' and a.status != 'Pending' group by a.kd_pesan order by a.tgl_pesan desc");
                     $n=mysqli_num_rows($sql);

                    if($n=="0"){
                       echo'<tr>
                        <td colspan="8"><br>Anda tidak memiliki histori pemesanan tiket. <br></td></tr>';
                        }

                    while($q=mysqli_fetch_array($sql)){
                      $no++;
                      $stt=$q['status'];
                      $kd=$q['kd_pesan'];

                    if($q['jenis']=='Vip'){
                      $jenis="<span class='label label-warning'>Vip</span>";
                    }else{
                      $jenis="<span class='label label-success'>Ekonomis</span>";
                    }
                     

                  ?>
                      <tr>
                        <td><br><?php echo $no; ?> <br></td>
                        <td><br><?php echo $q['kd_pesan']; ?> <br></td>
                        <td><br><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?> <?php echo $jenis; ?><br></td>
                        <td><br><?php echo date('d M Y',strtotime($q['tgl_berangkat'])); ?> <p></td>
                        <td><br><?php echo date('H:i',strtotime($q['jadwal'])); ?><br></td>
                        <td><br><?php echo $q['jk']; ?> Tiket<br></td>
                        <td><br><?php if($stt=="Lunas") echo "<span class='label label-success'>".$stt."</span>"; else echo "<span class='label label-danger'>".$stt."</span>"; ?> <br></td>

                        <?php if($stt=="Lunas"){ ?>
                          
                              <td><br><a target="_blank" href="pages/cetak-pesanan-saya.php?&kd=<?php echo $kd; ?>" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a></br></td>
                           
                        <?php }else{ ?>
                        <td><br></br></td>
                
                        <?php } ?>
                       </tr>

                      <?php } ?>
                      <tr>
                     
                     <tbody>
                    
                  </table>
                </div>
                   </div>
                        </div>  
                        <br>
                
                          
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->