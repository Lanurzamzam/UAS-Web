  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tiket
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Tiket</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Tiket</h3>  
                </div><!-- /.box-header -->
                    <div class="box-header">
                    <div class="row">
                      <div class="col-md-12">
                      <form action="#" method="post">
                        <div class="col-md-3">
                       

                            <select name="tujuan" class="form-control">
                              <option value="">-Tujuan-</option>
                                    <?php
                       include './../config/koneksi.php'; 
                       
                             $sqlt=mysqli_query($koneksi,"SELECT * FROM tb_tujuan");
                       
                      while($t=mysqli_fetch_array($sqlt)){
                      
                     ?>
                               <option value="<?php echo $t['kd_tujuan']; ?>" <?php if($_POST['tujuan']==$t['kd_tujuan']){echo "Selected";}else{echo "";} ?>><?php echo $t['dari']; ?> - <?php echo $t['tujuan']; ?></option>
                               <?php } ?>
                            </select>
                        
                        </div>
                        <div class="col-md-3">
                          <div class="input-group">

                            <input type="text" class="form-control" name="tanggal" value="<?php if(empty($_POST['tanggal'])){echo "";}else{echo $_POST['tanggal'];} ?>" placeholder="Tanggal" id="datepicker1">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <select name="jam" class="form-control">
                              <option value="">-Jam Berangkat-</option>
                              <?php
                      
                       
                             $sqlj=mysqli_query($koneksi,"SELECT * FROM tb_jadwal");
                       
                      while($j=mysqli_fetch_array($sqlj)){
                      
                     ?>
                               <option value="<?php echo $j['kd_jadwal']; ?>" <?php if($_POST['jam']==$j['kd_jadwal']){echo "Selected";}else{echo "";} ?>><?php echo date("H:i",strtotime($j['jadwal'])); ?></option>
                               <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-1"><button type="submit" name="b1" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                          </div>
                          
                      </form>
                      </div>
                    </div>
                  </div>
                   
                <div class="box-body">
                 <div class="table-responsive">     
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
                        <th>Alamat</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       
                        if(isset($_POST['b1'])){

                          if(!empty($_POST['tanggal']) and !empty($_POST['jam']) and !empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and date(b.tgl_berangkat)='$_POST[tanggal]' and b.kd_tujuan='$_POST[tujuan]' and b.kd_jadwal='$_POST[jam]' ORDER BY c.no_kursi ASC");

                            }elseif(!empty($_POST['tanggal']) and empty($_POST['jam']) and empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and date(b.tgl_berangkat)='$_POST[tanggal]' ORDER BY c.no_kursi ASC");
                            
                            }elseif(empty($_POST['tanggal']) and !empty($_POST['jam']) and empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and b.kd_jadwal='$_POST[jam]' ORDER BY c.no_kursi ASC");

                            }elseif(empty($_POST['tanggal']) and empty($_POST['jam']) and !empty($_POST['tujuan'])){

                            $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and b.kd_tujuan='$_POST[tujuan]' ORDER BY c.no_kursi ASC");

                            }elseif(!empty($_POST['tanggal']) and empty($_POST['jam']) and !empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and date(b.tgl_berangkat)='$_POST[tanggal]' and b.kd_tujuan='$_POST[tujuan]' ORDER BY c.no_kursi ASC");

                            }elseif(!empty($_POST['tanggal']) and !empty($_POST['jam']) and empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and date(b.tgl_berangkat)='$_POST[tanggal]' and b.kd_jadwal='$_POST[jam]' ORDER BY c.no_kursi ASC");

                            }elseif(empty($_POST['tanggal']) and !empty($_POST['jam']) and !empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' and b.kd_tujuan='$_POST[tujuan]' and b.kd_jadwal='$_POST[jam]' ORDER BY c.no_kursi ASC");
                            }else{
                              
                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' ORDER BY c.no_kursi ASC");
                            }


                            
                               
                          
                        }else{

                              
                             $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' ORDER BY c.no_kursi ASC");
                                 
                        }
                        $no=0;$total=0;
                  
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_tiket']; ?></td>
                        <td><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_berangkat'])); ?>, <?php echo date("H:i a",strtotime($q['jadwal'])); ?></td>
                        
                        <td><?php echo $q['nm_penumpang']; ?></td>
                        <td><?php echo $q['no_kursi']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                        <td><?php echo $q['alm']; ?></td>
                        <td>Rp <?php echo number_format($q['harga']); ?></td>
                    
                      </tr>

                  <?php } ?>
                    </tbody>
                   
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>
     <!-- DataTables -->
     
     
     <script src="../assets/js/jQuery.js"></script>
            <script src="../assets/js/moment.js"></script>

     <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
     <script type="text/javascript">
      $(function () {
        
        $('#datepicker1').datetimepicker({
                                  
          format: 'YYYY-MM-DD',
            sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });
         
      });
    </script>