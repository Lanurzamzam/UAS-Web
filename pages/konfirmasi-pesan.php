    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Konfirmasi Pembayaran</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Konfirmasi</li>
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
                                    <li class="active"><a href="#Pesanan" data-toggle="tab">Konfirmasi Pembayaran</a></li>
                                   
                                </ul>

                                <div id="myTabContent" class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Pesanan">
                                     
                                  <div class="col-md-12">
                                    <form method="post" action="#" enctype="multipart/form-data">

                                     <?php 
                           

                            $auto=rand(1111111,9999999);
                            $_POST['id']="KD-K".$auto;

                            $kode=rand();

                            

                            if(isset($_POST['b1'])){

                              $tmpf=$_FILES['bukti_pembayaran']['tmp_name'];
                                  $nmf=$_FILES['bukti_pembayaran']['name'];
                              
                            if(empty($_POST['rekening_pengirim']) or empty($_POST['jumlah_pembayaran']) or empty($nmf)){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              date_default_timezone_set("Asia/Jakarta");

                                
                                  move_uploaded_file($tmpf,"./assets/images/transaksi/".$nmf);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_konfirmasi values ('$_POST[id]','$_GET[kd]','$_POST[rekening_pengirim]','$nmf')");
                                
                                 $sql2=mysqli_query($koneksi,"UPDATE tb_pesan SET batas_waktu=NULL,status='Pengecekan' WHERE kd_pesan='$_GET[kd]'");

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Pemesanan anda berhasil dikonfirmasi, silahkan tunggu sesaat kami sedang melakukan pengecekan transaksi anda, jika pembayaran sukses tiket akan muncul di histori pesanan.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=pesanan-saya>";
                            }
                            }
                            ?>
                                     
                                      <input type="hidden" name="kode" value="<?php echo $_GET['kode']; ?>">
                                    <div class="col-md-6">
                                      
                                      <div class="form-group">
                                        <label for="rekening_pengirim" class="control-label">Nomor Rekening Pengirim</label>
                                        
                                        <input id="rekening_pengirim" type="text" class="form-control" name="rekening_pengirim" value="">
                                        <span>* Nomor rekening anda waktu melakukan pembayaran, jika tidak ada kosongkan saja.</span>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="jumlah_pembayaran" class="control-label">Jumlah Pembayaran</label>
                                        
                                        <input id="jumlah_pembayaran" type="text" class="form-control" name="jumlah_pembayaran" value="" required autofocus>
                                        <span>* Jumlah anda melakukan pembayaran hingga 3 digit terakhir.</span>
                                      
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="bukti_pembayaran" class="control-label">Bukti Pembayaran</label>
                                        
                                        <input id="bukti_pembayaran" type="file" class="form-control" name="bukti_pembayaran" value="" required autofocus>
                                        <span>* Format support jpeg, jpg, png, gif ukuran maksimal 1 mb.</span>
                                       
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <button type="submit" name="b1" class="btn btn-default btn-lg ">
                                      <i class="fa fa-send"></i> Kirim
                                      </button>
                                    </div>
                                   
                                  </form>
                                  </div>
                                    
                                   
                                </div>
                            </div>
              
                </div>
             
            </div>
        </section>
    </section>
