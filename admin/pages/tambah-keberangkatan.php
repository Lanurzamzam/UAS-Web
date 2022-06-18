<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Keberangkatan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
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
                  <h3 class="box-title">Form Keberangkatan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../config/koneksi.php';

                            $auto=rand(111,999);
                            $_POST['kd']="KBR".$auto;

                            

                            if(isset($_POST['b1'])){
                              
                            if(empty($_POST['kd']) or empty($_POST['tgl'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_keberangkatan values ('$_POST[kd]','$_POST[tgl]','$_POST[jam]','$_POST[tujuan]','$_POST[mobil]','$_POST[sopir]','$_POST[jenis]','$_POST[harga]','$_POST[tiket]','$_POST[tiket]')");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Keberangkatan</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $_POST['kd']; ?>" placeholder="KD Keberangkatan" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Berangkat</label>
                                   <input type="text" name="tgl" id="datepicker" class="form-control" maxlength="100" placeholder="Tanggal">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jam Berangkat</label>
                                   <select name="jam" class="form-control">
                              <option value="">-Jam Berangkat-</option>
                              <?php
                      
                       
                             $sqlj=mysqli_query($koneksi,"SELECT * FROM tb_jadwal");
                       
                      while($j=mysqli_fetch_array($sqlj)){
                      
                     ?>
                               <option value="<?php echo $j['kd_jadwal']; ?>"><?php echo date("H:i",strtotime($j['jadwal'])); ?></option>
                               <?php } ?>
                            </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tujuan </label>
                                  <select name="tujuan" class="form-control">
                              <option value="">-Tujuan-</option>
                                    <?php
                     
                       
                             $sqlt=mysqli_query($koneksi,"SELECT * FROM tb_tujuan");
                       
                      while($t=mysqli_fetch_array($sqlt)){
                      
                     ?>
                               <option value="<?php echo $t['kd_tujuan']; ?>"><?php echo $t['dari']; ?> - <?php echo $t['tujuan']; ?></option>
                               <?php } ?>
                            </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Mobil</label>
                                       <select name="mobil" class="form-control">
                              <option value="">-Mobil-</option>
                                    <?php
                     
                       
                             $sqlt=mysqli_query($koneksi,"SELECT * FROM tb_mobil");
                       
                      while($t=mysqli_fetch_array($sqlt)){
                      
                     ?>
                               <option value="<?php echo $t['kd_mobil']; ?>"><?php echo $t['merk']; ?> / <?php echo $t['flat_nmr']; ?></option>
                               <?php } ?>
                            </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                               <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Sopir</label>
                                       <select name="sopir" class="form-control">
                              <option value="">-Sopir-</option>
                                    <?php
                     
                       
                             $sqlt=mysqli_query($koneksi,"SELECT * FROM tb_sopir");
                       
                      while($t=mysqli_fetch_array($sqlt)){
                      
                     ?>
                               <option value="<?php echo $t['kd_sopir']; ?>"><?php echo $t['nama']; ?></option>
                               <?php } ?>
                            </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                               <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jenis</label>
                                   <select name="jenis" class="form-control" required="">
                                     <option value="">-Pilih-</option>
                                     <option value="Ekonomis">Ekonomis</option>
                                     <option value="Vip">Vip</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                              <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Harga</label>
                                   <input name="harga" class="form-control" required="">
                                     
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jumlah Tiket</label>
                                   <input name="tiket" class="form-control" required="">
                                     
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Keberangkatan</button>
                                    <a href="home.php?p=list-keberangkatan" class="btn btn-info"><i class="fa fa-table"></i> List Keberangkatan</a>
                                </div>
                            </div>
                        </form>
                  </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>
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
        
        $('#datepicker').datetimepicker({
                                  
          format: 'YYYY-MM-DD',
            sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });
       
      });
    </script>