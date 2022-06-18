
<section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>Profil Saya</h2>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Profil</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="content about">
            <div class="container">
                <div class="row sub_content">
                     <div class="eve-tab sidebar-tab">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Pesanan" data-toggle="tab">Biodata</a></li>
                                   
                                </ul>

                                <div id="myTabContent" class="tab-content clearfix">
                                   
                                    
                                  <div class="col-md-12">
                                     <?php 
                         include './config/koneksi.php';

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nama'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_member SET nama='$_POST[nama]',jekel='$_POST[jekel]',telp='$_POST[telp]',email='$_POST[email]',password='$pass' where kd_member='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                                    <form method="post" action="#" enctype="multipart/form-data">

                                     <?php 
                          $sql9=mysqli_query($koneksi,"SELECT * FROM tb_member WHERE kd_member='$_SESSION[us]'");
                            $q9=mysqli_fetch_array($sql9);
                            ?>

                                      <input type="hidden" name="pass_lama" value="<?php echo $q9['password']; ?>">
                                   
                                      <input type="hidden" name="id" value="<?php echo $q9['kd_member']; ?>">
                                
                                   
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="nama" class="control-label">Nama Lengkap</label>
                                        
                                        <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $q9['nama']; ?>">
                                      
                                        
                                      </div>
                                      <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        
                                        <input id="email" type="text" class="form-control" name="email" value="<?php echo $q9['email']; ?>">

                                      </div>
                                      <div class="form-group">
                                        <label for="jenis_kelamin" class="control-label">Jenis kelamin</label>
                                        <br>
                                         <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki" <?php if($q9['jekel']=='Laki-laki') echo "checked"; ?>> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan" <?php if($q9['jekel']=='Perempuan') echo "checked"; ?>> Perempuan
                                        </label>
                                     
                                        
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      
                                       <div class="form-group">
                                        <label for="nomor_telepon" class="control-label">Nomor Telepon</label>
                                        
                                        <input id="nomor_telepon" type="text" class="form-control" name="telp" value="<?php echo $q9['telp']; ?>">
                                      
                                      </div>
                          
                                      <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        
                                        <input id="password" type="password" class="form-control" name="pas" value="<?php echo $q9['password']; ?>" placeholder="Password">
                                        <label for="pass">* Untuk merubah password silahkan hapus password lama.</label>
                                   
                                      </div>
                                   
                                    </div>

                                    <div class="col-md-12">
                                      <div class="row">
                                  
                                      <div class="col-md-12">
                                      <button type="submit" name="b1" class="btn btn-default btn-lg ">
                                      <i class="fa fa-edit"></i> Simpan Perubahan
                                      </button>
                                    </div>
                                  </div>
                                    </div>
                                
                                  </form>
                                  </div>
                                    
                                   
                                </div>
                            </div>
              
                </div>
             
            </div>
        </section>
    </section>
