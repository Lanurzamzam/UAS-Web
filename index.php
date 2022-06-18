 <!DOCTYPE html>
<html class="no-js" lang="en"> 
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="./assets/images/icon.png"/>
    <title>Pemesanan Tiket Bis</title>
    <meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./assets/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="./assets/css/layout/wide.css" data-name="layout">

    <link rel="stylesheet" href="./assets/css/fractionslider.css"/>
    <link rel="stylesheet" href="./assets/css/style-fraction.css"/>
    <link rel="stylesheet" href="./assets/css/animate.css"/>

    <link rel="stylesheet" type="text/css" href="./assets/css/switcher.css" media="screen" />
     <script src="./assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>
<body>
<!--Start Header-->
<header id="header">
    <!-- Start info-bar -->
    <div id="info-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 top-info hidden-xs">
                    <span><i class="fa fa-phone"></i>Phone: 0821-1234-1234</span>
                    <span><i class="fa fa-envelope"></i>Email: tiketbis@gmail.com</span>
                </div>
              
            </div>
        </div>
    </div>
    <!--/#info-bar -->

    <div id="logo-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div id="logo">
                        <h1><a href="index.php"><img src="./assets/images/logo.webp" alt="Everest"/></a></h1>
                    </div>
                </div>

               <div class="col-md-9 col-sm-9">
                <!-- Navigation
                ================================================== -->
                    <div class="navbar navbar-default navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                       <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?p=mobil">Bus Armada</a></li>
                    <li><a href="index.php?p=cara">Cara Pemesanan</a></li>
                    <li><a href="index.php?p=kontak">kontak</a></li>
                </ul>
                  <ul class="nav navbar-nav navbar-right">
                         <?php 
                         error_reporting(0);
                         session_start();
                         include './config/koneksi.php';

                         if(@$_SESSION['us']==""){

                        echo'
                         <li><a href="#modal-index" data-toggle="modal" data-target="#modal-index" id="0" class="login">Login</a></li>
                          <li><a href="index.php?p=daftar">Daftar</a></li>';

                            }else{
                               $id=@$_SESSION['us'];

                                 $query4=mysqli_query($koneksi,"SELECT * FROM tb_member WHERE kd_member='$id'");
                                $q=mysqli_fetch_array($query4);
                                echo'
                                <li class="dropdown profil">
                                    <a href="#" class="dropdown-toggle a-profil" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    
                                    <img class="img-profil" src="./assets/images/users/default.png"/>
                                    
                                      <span>'.$q['nama'].'</span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="index.php?p=profil"><i class="fa fa-user"></i> Profil</a></li>
                                        <li><a href="index.php?p=pesanan-saya"><i class="fa fa-shopping-cart"></i> Pesanan Tiket</a></li>
                                       
                                        <li><a href="./logout/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                     </ul>
                                </li>';
                            }
                                ?>
                          </ul>
            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container -->
    </div>
    <!--/#logo-bar -->
</header>
<!--End Header-->


 <div class="container">
                  <div class="modal fade" id="modal-index" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-login">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="color: #1ABC9C;">Login</h4>
                        </div>
                        <form action="login/login.php" method="post">
                        <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default btn-lg btn-login" id="login" data-loading-text="Loading...">Login</button>
                            <a href="index.php?p=lupa-password" class="lp" style="color:#555;">Lupa password ?</a>
                              
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
                            $page_dir='pages';
                            if(!empty($_GET['p'])){
                                $page=scandir($page_dir,0);
                                unset($page[0],$page[1]);
                                $p=$_GET['p'];
                                if(in_array($p.'.php',$page)){
                                    include($page_dir.'/'.$p.'.php');
                                }
                                else{
                                    echo 'Halaman tidak ditemukan!';
                                }
                            }
                            else{
                                 include ($page_dir.'/welcome.php');
                            }
                            ?>

<!--start footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
          
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget_title">
                    <h4><span>Bus Armada</span></h4>

                </div>
                  <div class="widget_content">
                    <ul class="links">
                     <?php
                    include './config/koneksi.php';
                     
                    $sql1=mysqli_query($koneksi,"SELECT * FROM tb_mobil limit 4");
                      while($q1=mysqli_fetch_array($sql1)){

                     ?>
                        <li><a href="#"><?php echo $q1['merk']; ?><span>Tahun keluaran : <?php echo $q1['th']; ?></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="widget_content">
                    <div class="tweet_go"></div>
                </div>
            </div>

              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget_title">
                    <h4><span>Tentang</span></h4>
                </div>
                <div class="widget_content">
                    <p>Anda dapat mengunjungi atau pun menghubungi kami melalui alamat dan kontak kami dibawah ini.</p>
                    <ul class="contact-details-alt">
                        <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>:  Jalan Cendrawasih Raya Blok B7/P, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15413 </p></li>
                        <li><i class="fa fa-user"></i> <p><strong>Phone</strong>:0821-1234-1234</p></li>
                        <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="#">tiketbis@gmail.com</a></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->
<!--end footer-->
<section class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright">Universitas Pembangunan Jaya &copy; <?php echo date('Y'); ?></p>
            </div>

            <div class="col-sm-6 ">
                <div class="footer_social">
                   
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="./assets/js/bootstrap.min.js"></script>
     <!-- DataTables -->
     
     
     <script src="./assets/js/jQuery.js"></script>
            <script src="./assets/js/moment.js"></script>

     <script src="./assets/js/bootstrap-datetimepicker.min.js"></script>
     <script type="text/javascript">
      $(function () {
        
        $('#datepickercari').datetimepicker({
                                  
          format: 'DD-MM-YYYY',
          minDate: "<?php echo date('Y-m-d'); ?>",
        });
         $('#datepickerumur').datetimepicker({
                                  
          format:'YYYY-MM-DD',
          defaultDate:'1950-01-01',
        
         
        });
        
      
      });
      </script>
<script type="text/javascript" src="./assets/js/jquery-nopen.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.easing.1.3.js"></script>
<script src="./assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.cookie.js"></script> <!-- jQuery cookie -->

<script src="./assets/js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="./assets/js/jquery.smartmenus.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.smartmenus.bootstrap.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="./assets/js/jflickrfeed.js"></script>
<script type="text/javascript" src="./assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="./assets/js/swipe.js"></script>

<script type="text/javascript" src="./assets/js/wow.min.js"></script>

<script src="./assets/js/main.js"></script>

<!-- Start Style Switcher -->
<div class="switcher"></div>
<!-- End Style Switcher -->
<script>
    $(window).load(function(){
        $('.slider').fractionSlider({
            'fullWidth':            true,
            'controls':             true,
            'responsive':           true,
            'dimensions':           "1920,450",
            'timeout' :             5000,
            'increase':             true,
            'pauseOnHover':         true,
            'slideEndAnimation':    false,
            'autoChange':           true
        });
    });
    // WOW Animation
    new WOW().init();
</script>
</body>
</html>