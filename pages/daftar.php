<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Mendaftar</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Daftar</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="dividerHeading">
                            <h4><span>Daftar</span></h4>
                        </div>
                       <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                       

                                        $pas=md5($_POST['pas']);

                                        $cup=mysqli_query($koneksi,"SELECT * FROM tb_member WHERE email='$_POST[email]' OR password='$pas'");
                                        $hup=mysqli_num_rows($cup);

                                        $ce=mysqli_query($koneksi,"SELECT * FROM tb_member WHERE email='$_POST[email]'");
                                        $hce=mysqli_num_rows($ce);


                                        $chp=mysqli_query($koneksi,"SELECT * FROM tb_member WHERE telp='$_POST[hp]'");
                                        $hchp=mysqli_num_rows($chp);



                            if(empty($_POST['nm']) or empty($_POST['hp']) or empty($_POST['email']) or empty($_POST['jekel']) or empty($_POST['pas'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                            }
                            else if($hce > 0){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Email sudah digunakan,silahkan masukan email lain.
                                  </div>';

                            }
                             else if($hchp > 0){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Nomor telepon telah digunakan, silahkan masukan nomor telepon yang lain.
                                  </div>';

                            }
                            else if($hup > 0){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Isikan email atau password lain.
                                  </div>';

                            }else{

                                   $auto=rand(000001,999999);
                            $kode="KK".$auto;

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_member values ('$kode','$_POST[nm]','$_POST[jekel]','$_POST[hp]','$_POST[email]','$pas','Ya',NOW())");
                            
            				
            						if(!$sql) {
            							 echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            												  <span aria-hidden="true">×</span></button>
            												  <strong>Error!</strong> Gagal melakukan pendaftaran.
            												  </div>';
            							
            						} else {
            							 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            												  <span aria-hidden="true">×</span></button>
            												  <strong>Sukses!</strong> Pendaftaran anda berhasil ,Silahkan login dengan email dan password yang anda daftarkan.
            												  </div>';
            						}
		
                            }
                            }
                            ?>
                        <form id="contactForm" action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-md-12 ">
                                        <input type="text" id="name" name="nm" class="form-control" maxlength="100" data-msg-required="Please enter your Nama." value="" placeholder="Nama lengkap" >
                                    </div>
                                    
                                
                                </div>
                            </div>
                               <div class="row">
                                <div class="form-group">
                                  
                                     <div class="col-md-12">
                                        <input type="text" id="hp" name="hp" class="form-control" maxlength="100" data-msg-required="Please enter the nomor telepon." value="" placeholder="Nomor Telepon">
                                    </div>
                                
                                </div>
                            </div>
                         
                             <div class="form-group" id="jk3">
                          
                                    <div class="col-md-12 ">
                                       <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki"> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan"> Perempuan
                                        </label>
                                    
                                
                                    </div>
                                </div>
                                <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" id="user" name="email" class="form-control" maxlength="100" data-msg-required="Please enter the username." value="" placeholder="Email">
                                    </div>
                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                  
                                     <div class="col-md-12">
                                        <input type="password" id="pas" name="pas" class="form-control" maxlength="100" data-msg-required="Please enter the password." value="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Daftar">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="sidebar">
                            <div class="widget_info">
                                <div class="dividerHeading">
                                    <h4><span>Petunjuk Pendaftaran</span></h4>
                                    </div>
                                <p><i class="fa fa-angle-double-right"></i> Isilah data anda dengan lengkap sesuai dengan data diri anda yang sebenarnya.</p><br>
                                
                                <p><i class="fa fa-angle-double-right"></i> Setelah anda mendaftar anda akan bisa langsung untuk memesan tiket atau pun mengirim paket.</p><br>
                                <p><i class="fa fa-angle-double-right"></i> Jika data anda tidak sesuai dengan yang sebenarnya maka kami tidak akan memproses pemesanan anda.</p><br>
                                 <p><i class="fa fa-angle-double-right"></i> Untuk informasi lebih lanjut silahkan anda hubungi kami lelalui kontak kami,atau anda juga dapat mengunjungi kami melalui alamat kami ,Terimakasih.</p>
                                
                               
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->