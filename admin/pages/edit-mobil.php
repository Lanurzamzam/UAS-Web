<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Mobil
            
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
                  <h3 class="box-title">Form edit Mobil</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../config/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['merk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              if($_FILES['ft']['name']==""){

                                  $nmf=$_POST['ft_lama'];

                              }else{

                                  $tmpf=$_FILES['ft']['tmp_name'];
                                  $nmf=$_FILES['ft']['name'];
                             
                                  move_uploaded_file($tmpf,"../assets/images/mobil/".$nmf);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_mobil SET merk='$_POST[merk]',foto='$nmf',flat_nmr='$_POST[flat]',th='$_POST[th]',jenis='$_POST[jenis]',fasilitas='$_POST[fasilitas]' where kd_mobil='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_mobil where kd_mobil='$id'"));
                      ?>
                    <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Mobil</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $q['kd_mobil']; ?>" placeholder="KD Mobil" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Merk</label>
                                   <input type="text" name="merk" class="form-control" maxlength="100"  placeholder="Merek" value="<?php echo $q['merk']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Foto</label>
                                <br>
                                <img src="./../assets/images/mobil/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                                <input type="hidden" name="ft_lama" value="<?php echo $q['foto']; ?>">
                                   <input type="file" name="ft" class="form-control" maxlength="100" placeholder="Foto">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Flat Nomor</label>
                                   <input type="text" name="flat" class="form-control" maxlength="100"  placeholder="Flat" value="<?php echo $q['flat_nmr']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tahun Keluaran</label>
                                   <input type="text" name="th" class="form-control" maxlength="100"  placeholder="Tahun" value="<?php echo $q['th']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Fasiltas</label>
                                  <textarea name="fasilitas" class="form-control"><?php echo $q['fasilitas']; ?></textarea> 
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
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Mobil</button>
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