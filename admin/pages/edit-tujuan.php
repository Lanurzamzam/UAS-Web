<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Tujuan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tujuan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form edit Tujuan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../config/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['dari'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_tujuan SET dari='$_POST[dari]',tujuan='$_POST[tuju]' where kd_tujuan='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_tujuan where kd_tujuan='$id'"));
                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Tujuan</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $q['kd_tujuan']; ?>" placeholder="ID Tujuan" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Dari</label>
                                   <input type="text" name="dari" class="form-control" maxlength="100" value="<?php echo $q['dari']; ?>" placeholder="Dari">
                                      </div>
                                      
                                </div>
                            </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tujuan</label>
                                   <input type="text" name="tuju" class="form-control" maxlength="100" value="<?php echo $q['tujuan']; ?>" placeholder="Tujuan">
                                      </div>
                                      
                                </div>
                            </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Tujuan</button>
                                    <a href="home.php?p=list-tujuan" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
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