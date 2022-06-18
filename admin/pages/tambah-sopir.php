<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Sopir
            
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
                  <h3 class="box-title">Form Sopir</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../config/koneksi.php';

                            $auto=rand(1111,9999);
                            $_POST['kd']="KS".$auto;

                            

                            if(isset($_POST['b1'])){
                              
                            if(empty($_POST['kd']) or empty($_POST['nama'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                               $tmpf=$_FILES['ft']['tmp_name'];
                              $nmf=$_FILES['ft']['name'];
                              move_uploaded_file($tmpf,"../assets/images/users/".$nmf);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_sopir values ('$_POST[kd]','$_POST[nama]','$_POST[jekel]','$_POST[telp]','$_POST[alamat]','$nmf')");
                                

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
                                     <label>KD Sopir</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $_POST['kd']; ?>" placeholder="KD sopir" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama</label>
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="" placeholder="Nama">
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
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki"> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan"> Perempuan
                                        </label>
                                     
                                </div>
                            </div>
                          </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Telepon</label>
                                   <input type="text" name="telp" class="form-control" maxlength="100" value="" placeholder="nomor Telepon">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>

                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Alamat</label>
                                 <textarea name="alamat" class="form-control"></textarea>
                                   
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
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Sopir</button>
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
