<!--start wrapper-->
<section class="wrapper">

<!--End Slider-->
  <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      
          <div class="widget widget_tab">
                                <div class="velocity-tab sidebar-tab">
                                    <ul  class="nav nav-tabs">
                                        <li class="active"><a href="#Popular" data-toggle="tab">Pilih Keberangkatan</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                          <div class="table-responsive">
                                             <table id="example1" class="table table-hover">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>jam Berangkat</th>
                        <th>Sisa</th>
                        <th>Harga Tiket</th>
                        <th></th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
      
                    $tj=$_GET['tj'];

                    $tt=$_GET['tb'];
                    $tb=date('Y-m-d',strtotime($tt));

                    $jml=$_GET['jpp'];

                    if(empty($tj) or empty($tt) or empty($jml)){

                           echo "
                             <script>
                             alert('Kategori pencarian tiket masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                    }else{

                      $no=0;

             
                      $tujuan=mysqli_query($koneksi,"SELECT *  FROM tb_tujuan WHERE kd_tujuan='$tj'");
                      $b=mysqli_fetch_array($tujuan);

                      date_default_timezone_set("Asia/Jakarta");
                      $tgls=date('Y-m-d');
                      $jams=date('H:i:s');

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan LEFT JOIN tb_jadwal ON tb_jadwal.kd_jadwal=tb_keberangkatan.kd_jadwal where tgl_berangkat='$tb' and kd_tujuan='$tj'");
                  
                    $cjd=mysqli_num_rows($sql);
                   
                    

                    if( $cjd > 0){
                        echo'<tr><b style="padding-left:100px; font-size:15px;color: rgb(26, 188, 156);border-right: 2px solid rgb(164, 162, 162);padding-right:10px;"> '.$b['dari'].' <i class="fa fa-arrow-right"></i> '.$b['tujuan'].'</b></tr>';
                      echo'<tr><b style="padding-left:10px; font-size:15px;color: rgb(231, 172, 32);"> <i class="fa fa-calendar"></i> '.date('d F Y',strtotime($tt)).'</h2></tr>';
                      echo'<hr>';
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                    $sisa=$q['sisa'];

                    $jpo=$sisa-$_GET['jpp'];

                    if($q['jenis']=='Vip'){
                      $jenis="<span class='label label-warning'>Vip</span>";
                    }else{
                      $jenis="<span class='label label-success'>Ekonomis</span>";
                    }

                      echo'<tr>
                        <td><br>'.$no.'<br></td>
                        <td><br>'.$b['dari'] .' - '. $b['tujuan'].'<br>'.$jenis.'</td>
                        <td><br>'.date('H:i',strtotime($q['jadwal'])).'<br></td>
                        <th><br>'.$sisa.' Tiket<br></th>
                        <td><br><b>Rp '.number_format($q['harga'],0,".",".").'</b> <br></td>';

                        if($tgls >= $tb and $jams > $q['jadwal'] ){

                          echo '<td><br><a href="#" class="btn btn-info pesan" disabled><i class="fa fa-ticket"></i> Pesan Tiket</a></td>';

                        }elseif($sisa <= 0){

                            echo '<td><br><a href="#" class="btn btn-info pesan" disabled><i class="fa fa-ticket"></i> Pesan Tiket</a></td>';

                        }elseif($jpo < 0){

                            echo '<td><br><a href="#" class="btn btn-info pesan" disabled><i class="fa fa-ticket"></i> Pesan Tiket</a></td>';

                        }
                        else{

                        echo'<td><br><a href="index.php?p=formulir-pesan&br='.$q['kd_keberangkatan'].'&tj='.$tj.'&tb='.$tb.'&jpp='.$_GET['jpp'].'&kj='.$q['kd_jadwal'].'" class="btn btn-success pesan"><i class="fa fa-ticket"></i> Pesan Tiket</a><br></td>';
                        }
                        echo"</td></tr>";
                      }

                    }else{
                 
                      echo'<tr>
                        <td colspan="8"><br><b> <i class="fa fa-info-circle"></i>  Untuk tanggal yang anda cari tiket sudah tak tersedia lagi, silahkan pilih tanggal lain.</b><br></td></tr>';
                      }
                    }
                     ?>
                     <tbody>
                    
                  </table>
                </div>
                  <a href="index.php?p=welcome" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
          </div>
 </section>