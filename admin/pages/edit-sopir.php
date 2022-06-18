<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Sopir
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Sopir</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form edit Sopir</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../config/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['nama'])){

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
                             
                                  move_uploaded_file($tmpf,"../assets/images/users/".$nmf);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_sopir SET nama='$_POST[nama]',jekel='$_POST[jekel]',telp='$_POST[telp]',alamat='$_POST[alamat]',foto='$nmf' where kd_sopir='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_sopir where kd_sopir='$id'"));
                      ?>
                       <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Sopir</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $q['kd_sopir']; ?>" placeholder="KD sopir" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama</label>
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="<?php echo $q['nama']; ?>" placeholder="Nama">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jenis Kelamin</label>
                                <br>
                                 <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki" <?php if($q['jekel']=="Laki-laki"){ echo "checked"; } ?>> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan" <?php if($q['jekel']=="Perempuan"){ echo "checked"; } ?>> Perempuan
                                        </label>
                                     
                                </div>
                            </div>
                          </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Telepon</label>
                                   <input type="text" name="telp" class="form-control" maxlength="100" value="<?php echo $q['telp']; ?>" placeholder="nomor Telepon">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>

                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Alamat</label>
                                 <textarea name="alamat" class="form-control"><?php echo $q['alamat']; ?></textarea>
                                   
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Foto</label>
                                <br>
                                <img src="./../assets/images/users/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                                <input type="hidden" name="ft_lama" value="<?php echo $q['foto']; ?>">
                                   <input type="file" name="ft" class="form-control" maxlength="100" placeholder="Foto">
                                      </div>
                                     
                                </div>
                            </div>

                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Sopir</button>
                                    <a href="home.php?p=list-sopir" class="btn btn-info"><i class="fa fa-table"></i> List Sopir</a>
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