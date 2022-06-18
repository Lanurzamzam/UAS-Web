<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Mobil
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Mobil</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Mobil</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../config/koneksi.php';

                            $auto=rand(1111,9999);
                            $_POST['kd']="KM".$auto;

                            

                            if(isset($_POST['b1'])){
                              
                            if(empty($_POST['kd']) or empty($_POST['merk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                               $tmpf=$_FILES['ft']['tmp_name'];
                              $nmf=$_FILES['ft']['name'];
                              move_uploaded_file($tmpf,"../assets/images/mobil/".$nmf);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_mobil values ('$_POST[kd]','$_POST[merk]','$nmf','$_POST[flat]','$_POST[th]','$_POST[fasilitas]','$_POST[jenis]')");
                                

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
                                     <label>KD Mobil</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $_POST['kd']; ?>" placeholder="KD Mobil" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Merk</label>
                                   <input type="text" name="merk" class="form-control" maxlength="100" value="" placeholder="Merek">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Foto</label>
                                   <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="Foto">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Flat Nomor</label>
                                   <input type="text" name="flat" class="form-control" maxlength="100" value="" placeholder="Flat">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tahun Keluaran</label>
                                   <input type="text" name="th" class="form-control" maxlength="100" value="" placeholder="Tahun">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Fasilitas</label>
                                   <textarea name="fasilitas" class="form-control"></textarea>  
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
                                     <option value="Ekonomis">Ekonomis</option>
                                     <option value="Vip">Vip</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                         
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Mobil</button>
                                    <a href="home.php?p=list-mobil" class="btn btn-info"><i class="fa fa-table"></i> List Mobil</a>
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
