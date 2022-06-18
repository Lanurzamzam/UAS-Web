<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Kursi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Kursi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form edit Kursi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../config/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['no'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                            
                                $sql=mysqli_query($koneksi,"UPDATE tb_kursi SET no_kursi='$_POST[no]',kd_mobil='$_POST[mobil]',jenis='$_POST[jenis]' where kd_kursi='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_kursi where kd_kursi='$id'"));
                      ?>
                       <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Kursi</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $q['kd_kursi']; ?>" placeholder="KD Kursi" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Mobil</label>
                                   <select name="mobil" class="form-control">
                                      <?php 
                                      $sql2=mysqli_query($koneksi,"SELECT * FROM tb_mobil");
                                        while($a=mysqli_fetch_array($sql2)){
                                      ?>

                                    <option value="<?php echo $a['kd_mobil']; ?>" <?php echo $q['kd_mobil']==$a['kd_mobil'] ? 'Selected' : '' ?>><?php echo  $a['flat_nmr']; ?> - <?php echo $a['merk']; ?> - <?php echo $a['jenis']; ?> </option>
                                    <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Kursi</label>
                                   <input type="text" name="no" class="form-control" maxlength="100" value="<?php echo $q['no_kursi']; ?>" placeholder="Nomor">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jenis</label>
                                  <select name="jenis" class="form-control">
                                     <option value="">-Pilih-</option>
                                     <option value="Ekonomis" <?php echo $q['jenis']=="Ekonomis" ? 'Selected' : '' ?>>Ekonomis</option>
                                     <option value="Vip" <?php echo $q['jenis']=="Vip" ? 'Selected' : '' ?>>Vip</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Kursi</button>
                                    <a href="home.php?p=list-kursi" class="btn btn-info"><i class="fa fa-table"></i> List Kursi</a>
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