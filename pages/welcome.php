<!--start wrapper-->
<section class="wrapper">
<div class="slider-wrapper">
    <div class="slider">
        <div class="fs_loader"></div>
        <div class="slide">

            <img src="./assets/images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img class="ftm" src="./assets/images/mobil/bus1.jpg" width="500" height="390" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Keselamatan</p>

            <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Keselamatan pelanggan menjadi prioritas utama  </p>

            <p class="sub-line" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Dari Kami </p>
        </div>

        <div class="slide">
            <img src="./assets/images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <p class="slide-heading" data-position="130,380" data-in="right"  data-out="left" data-ease-in="jswing">Kenyamanan</p>

            <p class="sub-line" data-position="225,380" data-in="right" data-out="left"  data-delay="1500">Kami akan selalu berusaha membuat pelanggan kami nyaman</p>

            <img class="ftm" src="./assets/images/mobil/bus2.jpg" width="500" height="400" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="sub-line" data-position="320,380" data-in="bottom" data-out="bottom" data-delay="2000">Dengan Kwalitas pelayanan Kami</p>
        </div>
         <div class="slide">

            <img src="./assets/images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img class="ftm" src="./assets/images/mobil/bus3.jpg" width="500" height="390" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Keselamatan</p>

            <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Kami selalu mengutamakan keselamatan pelanggan kami  </p>

            <p class="sub-line" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Selama bersama kami</p>
        </div>
        <div class="slide">
            <img src="./assets/images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <p class="slide-heading" data-position="130,380" data-in="right"  data-out="left" data-ease-in="jswing">Kenyamanan</p>

            <p class="sub-line" data-position="225,380" data-in="right" data-out="left"  data-delay="1500">Kami akan selalu berusaha membuat pelanggan kami nyaman</p>

            <img class="ftm" src="./assets/images/mobil/bus4.jpg" width="500" height="400" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="sub-line" data-position="320,380" data-in="bottom" data-out="bottom" data-delay="2000">Dengan Armada yang bagus</p>
        </div>
        

    </div>
</div>
<!--End Slider-->

  <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      
          <div class="widget widget_tab">
                                <div class="velocity-tab sidebar-tab">
                                    <ul  class="nav nav-tabs">
                                        <li class="active"><a href="#Popular" data-toggle="tab">Cari Tiket</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                       <form id="contactForm" action="index.php?p=pilih-tiket" method="GET">
                                             <div class="col-md-4">
                                             <input type="hidden" name="p" value="pilih-tiket">
                                             <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
                                     <label>Tujuan</label>
                                        <div class="input-group"  style="padding-bottom: 5px;">
                                        <div class="input-group-addon"><i class="fa fa-arrow-right"></i></div>
                                        <select name="tj" id="select" class="form-control">
                                        <option value="">-Tujuan-</option>
                                        <?php  

                            include './config/koneksi.php';

                                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_tujuan");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kd_tujuan']; ?>"><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></option>
                                        <?php } ?>
                                      </select>
                                      </div>
                                      <i>* Tujuan keberangkatan anda</i>
                                    </div>
                                </div></div>
                                             </div>
                                             <div class="col-md-4">
                                             <div class="row">
                                                <div class="form-group">
                                     <div class="col-md-12">
                                     <label>Tanggal Berangkat</label>
                                       <div class="input-group date" style="padding-bottom: 5px;">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" name="tb" class="form-control" placeholder="Tanggal Berangkat" id="datepickercari">
                                          
                                          </div>
                                        
                                          <i>* Tanggal anda berangkat</i>
                                     
                                </div>
                                </div>
                                             </div>
                                             </div>
                                                 <div class="col-md-4">
                                               <div class="row">
                                <div class="form-group"  style="padding-bottom: 5px;">
                                 <label style="padding-left: 15px;">Jumlah Penumpang</label>
                                     <div class="col-md-12">
                                       
                                     
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                        <select name="jpp" id="select" class="form-control">
                                        <option value="0">-Jumlah-</optiom>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    
                                      </select>
                                      </div>
                                      </div>

                                      </div>

                                      <i>* Jumlah tiket yang akan dipesan, isi sesuai kebutuhan.</i>
                                  
                                </div>
                                </div>
                                 

                                       <div class="col-md-12">
                                    <div class="row">
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-8"></div>
                                     <div class="col-md-2">
                                    <button  type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg btn-cari btn-block"><i class="fa fa-search"></i> Cari Tiket</button>
                                </div>
                                             </form>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
               <div class="container">
            <div class="row super_sub_content">
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 green">
                        <div class="service-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="service-content">
                            <h3>Sopir</h3>
                            <p> Sopir Yang berpengalaman.</p>
                            <div class="read">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 purple">
                        <div class="service-icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <div class="service-content">
                            <h3>Mobil</h3>
                            <p> Mobil yang nyaman, model terbaru.</p>
                            <div class="read">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 red">
                        <div class="service-icon">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                        <div class="service-content">
                            <h3>Tujuan</h3>
                            <p> Memiliki beberapa rute tujuan .</p>
                            <div class="read">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 blue">
                        <div class="service-icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="service-content">
                            <h3>Harga</h3>
                            <p> Harga yang bersahabat.</p>
                            <div class="read">
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>
          </div>
 </section>
