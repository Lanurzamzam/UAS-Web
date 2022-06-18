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
                                        <li class="active"><a href="#Popular" data-toggle="tab">Formulir Penumpang</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                       <form id="contactForm" action="index.php?" method="GET">
                                             <div class="col-md-6">
                                             <input type="hidden" name="p" value="proses_pesan" required>

                                               <input type="hidden" name="jp" value="<?php echo $_GET['jpp']; ?>" required>
                                               <input type="hidden" name="br" value="<?php echo $_GET['br']; ?>" required>
                                              <?php
                                              $jmls=$_GET['jpp'];
                                                  for ($i=1; $i <= $jmls; $i++) { 
                                              ?>
                                             <div class="penumpang">
                                             <div class="row">
                                <div class="form-group">
                                   <div class="col-md-3">
                                     <label>Title</label>
                                     <select name="tit<?php echo $i; ?>" class="form-control" required>
                                       <option value="Tuan">Tuan</option>
                                       <option value="Nyonya">Nyonya</option>
                                       <option value="Nona">Nona</option>
                                     </select>
                                         <i>* Title anda.</i>
                                      </div>
                                     <div class="col-md-9">
                                     <label>Nama Lengkap</label>
                                        <input type="text" name="nml<?php echo $i; ?>" class="form-control" required>
                                         <i>* Nama penumpang yang akan berangkat sesuai dengan identitas asli.</i>
                                      </div>
                                    
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group"  style="padding-bottom: 5px;">
                                         <div class="col-md-6">
                                        <label>Nomor Telpon</label>
                                          <input name="telp<?php echo $i; ?>" class="form-control" required>
                                      <i>* Nomor telepon.</i>
                                    </div>
                                    <div class="form-group"  style="padding-bottom: 5px;">
                                     <div class="col-md-6">
                                        <label>Alamat</label>
                                        <input name="alm<?php echo $i; ?>" class="form-control" required>
                                      <i>* Alamat tinggal.</i>
                                    </div>

                                </div>
                                </div>
                                </div>
                                    
                                </div>
                                <br>
                                <?php } ?>

                                             <p>
                                              <div class="row">
                                <div class="col-md-12">
                                    <button  type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg btn-cari" id="submit">Selanjutnya</button>
                                </div>
                            </div>

                               <?php  
                                          $sql=mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan WHERE kd_keberangkatan='$_GET[br]'");
                                           $br=mysqli_fetch_array($sql);

                                        $sql2=mysqli_query($koneksi,"SELECT * FROM tb_tujuan WHERE kd_tujuan='$_GET[tj]'");
                                           $qr=mysqli_fetch_array($sql2);

                                           $sql3=mysqli_query($koneksi,"SELECT * FROM tb_jadwal WHERE kd_jadwal='$_GET[kj]'");
                                           $qj=mysqli_fetch_array($sql3);

                                           if($br['jenis']=='Vip'){
                                              $jenis="<span class='label label-warning'>Vip</span>";
                                            }else{
                                              $jenis="<span class='label label-success'>Ekonomis</span>";
                                            }

                                                   ?>
                                
                                             </div>
                                             <div class="col-md-5">
                                          
                                            
                                               <label>Pilih Kursi</label><br>
                                               * Merah : Belum dipesan.<br>
                                               * Hijau : Sudah dipesan
<blockquote class="default">
    <link rel="stylesheet" href="./assets/css/style-bangku.css">
<div class="plane">

  <ol class="cabin fuselage">
    <h5>Depan</h5>
<?php 
$cur = 1;
$rowNum = 1;
 $qk=mysqli_query($koneksi,"SELECT * FROM tb_kursi WHERE kd_mobil='$br[kd_mobil]'");
while($k=mysqli_fetch_array($qk)){



if($cur == 1){ ?>

    <li class="row row--<?php echo $rowNum; ?>">
      <ol class="seats" type="A">
      <?php } ?>
      <?php 
      $cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_tiket WHERE kd_keberangkatan='$br[kd_keberangkatan]' and kd_kursi='$k[kd_kursi]'"));
      
          ?>
        <li class="seat">
         
          <input type="checkbox" <?php echo $cek==true ? "disabled='disabled'" : ""; ?>" value="<?php echo $k['kd_kursi']; ?>" class="<?php echo $cek==true ? "dipesan" : ""; ?>" name="kursi[]" id="<?php echo $k['no_kursi']; ?>">
    
          <label for="<?php echo $k['no_kursi']; ?>"><?php echo $k['no_kursi']; ?></label>
        </li>

        <?php if($cur==4){ ?>
      </ol>
    </li>
    <?php $cur=1; $rowNum++; 
  }else{
      $cur++;
    }
 } 

 ?>
      <h5>Belakang</h5>
  </ol>

</div>
                                             </blockquote>

                                              <label>Rincian Keberangkatan</label>
                                             <blockquote class="default">
                                               Tujuan :
                                               <p class="rincian"><b><?php echo $qr['dari']; ?> <i class="fa fa-arrow-right"></i> <?php echo $qr['tujuan']; ?></b> <?php echo $jenis; ?></p>
                                               Tanggal Berangkat :
                                               <p class="rincian"><b><?php echo date('d F Y',strtotime($_GET['tb'])); ?></b> <?php echo date('H:i a',strtotime($qj['jadwal'])); ?></p>
                                            
                                               Harga / Tiket :
                                              <p style="padding-left: 15px;"><b>
                                                <span id="sjo"><?php echo $_GET['jpp']; ?></span> 
                                                 x Rp <?php echo number_format($br['harga'],0,".","."); ?></b></p>
                                               Total :
                                               <p style="font-size: 20px;padding-left: 15px;"><b>Rp 
                                                 <?php 

                                              $tot=$_GET['jpp']*$br['harga'];

                                               ?>
                                              <span id='stoth'><?php echo number_format($tot,0,".","."); ?></span>
                                               </b></p>

                                             </blockquote>
                                   
                                             </div>
                                              <input type="hidden" name="jn" value="<?php echo $br['jenis']; ?>" required>
                                              <input id="ijo" type="hidden" name="jmlk" value="<?php echo $_GET['jpp']; ?>" required>
                                               <input id="h1" type="hidden" name="h1" value="<?php echo $br['harga']; ?>" required>
                                              <input id="itoth" type="hidden" name="total" value="<?php echo $tot; ?>" required>
                                             </form>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
          </div>
 </section>

<script>
   $(document).ready(function () {
    $('#submit').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      var jp=<?php echo $_GET['jpp']; ?>

      if(checked < jp) {
        alert("Harap memilih kursi minimal "+jp);
        return false;
      }

    });
});

  $(".plane input[type=checkbox]").click(function(){
    var countchecked = $(".plane input[type=checkbox]:checked").length;
    var jo =document.getElementById("ijo").value=countchecked;
    var h1= document.getElementById("h1").value;
    var toth=parseInt(jo)*parseInt(h1);
    document.getElementById("itoth").value=toth;
   
    document.getElementById("sjo").innerHTML =jo;
    document.getElementById("stoth").innerHTML =convertToRupiah(toth);

    if(countchecked >= 5){
        $('.plane input[type=checkbox]').not(':checked').attr("disabled",true);
    }else{   
        $('.plane input[type=checkbox]').not(':checked').attr("disabled",false);
        $('.plane .dipesan').not(':checked').attr("disabled",true);
    }

   function convertToRupiah(angka)
  {
    var rupiah = '';    
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return rupiah.split('',rupiah.length-1).reverse().join('');
  }

});
</script>