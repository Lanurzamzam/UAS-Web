  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Keberangkatan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Keberangkatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Keberangkatan</h3>  
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
                        <th>KD</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Mobil</th>
                        <th>Sopir</th>
                        <th>Jenis</th>
                        <th>Tiket</th>
                        <th>Act</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       
                        if(isset($_POST['b1'])){

                          if(!empty($_POST['tanggal']) and !empty($_POST['jam']) and !empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and date(tb_keberangkatan.tgl_berangkat)='$_POST[tanggal]' and tb_keberangkatan.kd_tujuan='$_POST[tujuan]' and tb_keberangkatan.kd_jadwal='$_POST[jam]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");

                            }elseif(!empty($_POST['tanggal']) and empty($_POST['jam']) and empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and date(tb_keberangkatan.tgl_berangkat)='$_POST[tanggal]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");
                            
                            }elseif(empty($_POST['tanggal']) and !empty($_POST['jam']) and empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and tb_keberangkatan.kd_jadwal='$_POST[jam]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");

                            }elseif(empty($_POST['tanggal']) and empty($_POST['jam']) and !empty($_POST['tujuan'])){

                            $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and tb_keberangkatan.kd_tujuan='$_POST[tujuan]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");

                            }elseif(!empty($_POST['tanggal']) and empty($_POST['jam']) and !empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and date(tb_keberangkatan.tgl_berangkat)='$_POST[tanggal]' and tb_keberangkatan.kd_tujuan='$_POST[tujuan]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");

                            }elseif(!empty($_POST['tanggal']) and !empty($_POST['jam']) and empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and date(tb_keberangkatan.tgl_berangkat)='$_POST[tanggal]' and tb_keberangkatan.kd_jadwal='$_POST[jam]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");

                            }elseif(empty($_POST['tanggal']) and !empty($_POST['jam']) and !empty($_POST['tujuan'])){

                              $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal and tb_keberangkatan.kd_tujuan='$_POST[tujuan]' and tb_keberangkatan.kd_jadwal='$_POST[jam]' ORDER BY tb_keberangkatan.tgl_berangkat DESC");
                            }else{
                              
                                  
                             $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal ORDER BY tb_keberangkatan.tgl_berangkat DESC");
                            }


                            
                               
                          
                        }else{

                              
                             $sql=mysqli_query($koneksi,"SELECT tb_keberangkatan.jenis as jn, tb_keberangkatan.*,tb_tujuan.*,tb_jadwal.*,tb_mobil.*,tb_sopir.* FROM tb_keberangkatan,tb_tujuan,tb_jadwal,tb_mobil,tb_sopir where tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_keberangkatan.kd_mobil=tb_mobil.kd_mobil and tb_keberangkatan.kd_sopir=tb_sopir.kd_sopir and tb_keberangkatan.kd_jadwal=tb_jadwal.kd_jadwal ORDER BY tb_keberangkatan.tgl_berangkat DESC");
                                 
                        }
                        $no=0;$total=0;
                  
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_keberangkatan']; ?></td>
                        <td><?php echo $q['tgl_berangkat']; ?>, <?php echo date("H:i a",strtotime($q['jadwal'])); ?></td>
                      
                        <td><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></td>
                        <td><?php echo $q['merk']; ?> / <?php echo $q['flat_nmr']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['jn']; ?></td>
                        <td><a href="home.php?p=tiket-keberangkatan&br=<?php echo $q['kd_keberangkatan']; ?>" class="btn btn-warning"> <i class="fa fa-ticket"></i> Lihat Tiket </a></td>
                       
                         <td>
                          <a href="./pages/delete-keberangkatan.php?id=<?php echo $q['kd_keberangkatan']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                       </td>
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