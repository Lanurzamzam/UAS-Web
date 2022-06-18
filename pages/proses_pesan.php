<?php 
  date_default_timezone_set("Asia/Jakarta");              

    if(!empty($_SESSION['us'])){
       $cekpesan1=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_pesan where kd_member='$_SESSION[us]' and status='Pending'"));

       $cekpesan2=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_pesan where kd_member='$_SESSION[us]' and status='Pengecekan'"));
    }

 if($_SESSION['us']==""){
  echo "
     <script>
     alert('Anda Harus Login terlebih dahulu.!');
     javascript:history.back();
     </script>
     ";
      }else if($cekpesan1 > 0){
      echo "
     <script>
     alert('Anda memiliki pemesanan yang menunggu pembayaran, silahkan selesaikan terlebih dahulu.!');
     javascript:history.back();
     </script>
     ";
      }else if($cekpesan2 > 0){
      echo "
     <script>
     alert('Anda memiliki pemesanan yang sedang pengecekan, silahkan tunggu terlebih dahulu.!');
     javascript:history.back();
     </script>
     ";
      
    }else{

        if($_GET['jp']==1){
          
          $auto=rand(000001,999999);
          $idp="KD-P".$auto;

          $idu=$_SESSION['us'];
        
          
          $tit1=$_GET['tit1'];
          $nml1=$_GET['nml1'];
          $alm1=$_GET['alm1'];
          $telp1=$_GET['telp1'];
          $br=$_GET['br'];
          $jn=$_GET['jn'];
          $jpk=$_GET['jmlk'];
          $tot=$_GET['total'];
          
          $tglp=date('Y-m-d H:i:s');

          $bts=date('Y-m-d H:i:s',strtotime('+2 Hours',strtotime($tglp)));

          $kode=rand(0,999);

          $keberangkatan=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan where kd_keberangkatan='$br'"));

    
        $sql=mysqli_query($koneksi,"INSERT INTO `tb_pesan`(`kd_pesan`, `kd_member`, `status`, `batas_waktu`, `kode`, `jenis`, `jml_kursi`, `total`, `kd_keberangkatan`, `tgl_pesan`) VALUES ('$idp','$idu','Pending','$bts','$kode','$jn','$jpk','$tot','$br','$tglp')");

          foreach($_GET['kursi'] as $kursi){ 

                $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");

          }
         $sisa=$keberangkatan['sisa']-$jpk;
         $upd=mysqli_query($koneksi,"UPDATE `tb_keberangkatan` SET `sisa`='$sisa' WHERE kd_keberangkatan='$br'");
           
 echo "
     <script>
     alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar yang tertera.!');
   
     </script>
     ";

   echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
  
  
  }
        
        if($_GET['jp']==2){

            $auto=rand(000001,999999);
          $idp="KD-P".$auto;

          $idu=$_SESSION['us'];
        
          
          $tit1=$_GET['tit1'];
          $nml1=$_GET['nml1'];
          $alm1=$_GET['alm1'];
          $telp1=$_GET['telp1'];

          $tit2=$_GET['tit2'];
          $nml2=$_GET['nml2'];
          $alm2=$_GET['alm2'];
          $telp2=$_GET['telp2'];

          $br=$_GET['br'];
          $jn=$_GET['jn'];
          $jpk=$_GET['jmlk'];
          $tot=$_GET['total'];
          
          $tglp=date('Y-m-d H:i:s');

          $bts=date('Y-m-d H:i:s',strtotime('+2 Hours',strtotime($tglp)));

          $kode=rand(0,999);

           $keberangkatan=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan where kd_keberangkatan='$br'"));


        $sql=mysqli_query($koneksi,"INSERT INTO `tb_pesan`(`kd_pesan`, `kd_member`, `status`, `batas_waktu`, `kode`, `jenis`, `jml_kursi`, `total`, `kd_keberangkatan`, `tgl_pesan`) VALUES ('$idp','$idu','Pending','$bts','$kode','$jn','$jpk','$tot','$br','$tglp')");

            $r=1;
            foreach($_GET['kursi'] as $kursi){ 
                $r++;
                if($r==1){
                  $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }elseif($r==2){
                $idt2="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt2','$idp','$br','$nml2','$tit2','$alm2','$telp2','$kursi')");

              }else{
                $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }
              }
    

         $sisa=$keberangkatan['sisa']-$jpk;
         $upd=mysqli_query($koneksi,"UPDATE `tb_keberangkatan` SET `sisa`='$sisa' WHERE kd_keberangkatan='$br'");
  
         
 echo "
     <script>
     alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
   
     </script>
     ";

    echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
  
  }

      if($_GET['jp']==3){

           $auto=rand(000001,999999);
          $idp="KD-P".$auto;

          $idu=$_SESSION['us'];
        
          
          $tit1=$_GET['tit1'];
          $nml1=$_GET['nml1'];
          $alm1=$_GET['alm1'];
          $telp1=$_GET['telp1'];

          $tit2=$_GET['tit2'];
          $nml2=$_GET['nml2'];
          $alm2=$_GET['alm2'];
          $telp2=$_GET['telp2'];

          $tit3=$_GET['tit3'];
          $nml3=$_GET['nml3'];
          $alm3=$_GET['alm3'];
          $telp3=$_GET['telp3'];

          $br=$_GET['br'];
          $jn=$_GET['jn'];
          $jpk=$_GET['jmlk'];
          $tot=$_GET['total'];
          
          $tglp=date('Y-m-d H:i:s');

          $bts=date('Y-m-d H:i:s',strtotime('+2 Hours',strtotime($tglp)));

          $kode=rand(0,999);

           $keberangkatan=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan where kd_keberangkatan='$br'"));
         
          $sql=mysqli_query($koneksi,"INSERT INTO `tb_pesan`(`kd_pesan`, `kd_member`, `status`, `batas_waktu`, `kode`, `jenis`, `jml_kursi`, `total`, `kd_keberangkatan`, `tgl_pesan`) VALUES ('$idp','$idu','Pending','$bts','$kode','$jn','$jpk','$tot','$br','$tglp')");

            $r=1;
            foreach($_GET['kursi'] as $kursi){ 
                $r++;
                if($r==1){
                  $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }elseif($r==2){
                $idt2="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt2','$idp','$br','$nml2','$tit2','$alm2','$telp2','$kursi')");

              }elseif($r==3){
                $idt3="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt3','$idp','$br','$nml3','$tit3','$alm3','$telp3','$kursi')");

              }else{
                $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }
           }
    

         $sisa=$keberangkatan['sisa']-$jpk;
         $upd=mysqli_query($koneksi,"UPDATE `tb_keberangkatan` SET `sisa`='$sisa' WHERE kd_keberangkatan='$br'");
         
 echo "
     <script>
     alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
   
     </script>
     ";

    echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
  
  }
    if($_GET['jp']==4){

           $auto=rand(000001,999999);
          $idp="KD-P".$auto;

          $idu=$_SESSION['us'];
        
          
          $tit1=$_GET['tit1'];
          $nml1=$_GET['nml1'];
          $alm1=$_GET['alm1'];
          $telp1=$_GET['telp1'];

          $tit2=$_GET['tit2'];
          $nml2=$_GET['nml2'];
          $alm2=$_GET['alm2'];
          $telp2=$_GET['telp2'];

          $tit3=$_GET['tit3'];
          $nml3=$_GET['nml3'];
          $alm3=$_GET['alm3'];
          $telp3=$_GET['telp3'];

          $tit4=$_GET['tit4'];
          $nml4=$_GET['nml4'];
          $alm4=$_GET['alm4'];
          $telp4=$_GET['telp4'];

          $br=$_GET['br'];
          $jn=$_GET['jn'];
          $jpk=$_GET['jmlk'];
          $tot=$_GET['total'];
          
          $tglp=date('Y-m-d H:i:s');

          $bts=date('Y-m-d H:i:s',strtotime('+2 Hours',strtotime($tglp)));

          $kode=rand(0,999);

           $keberangkatan=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan where kd_keberangkatan='$br'"));
         
          $sql=mysqli_query($koneksi,"INSERT INTO `tb_pesan`(`kd_pesan`, `kd_member`, `status`, `batas_waktu`, `kode`, `jenis`, `jml_kursi`, `total`, `kd_keberangkatan`, `tgl_pesan`) VALUES ('$idp','$idu','Pending','$bts','$kode','$jn','$jpk','$tot','$br','$tglp')");

            $r=1;
            foreach($_GET['kursi'] as $kursi){ 
                $r++;
                if($r==1){
                  $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }elseif($r==2){
                $idt2="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt2','$idp','$br','$nml2','$tit2','$alm2','$telp2','$kursi')");

              }elseif($r==3){
                $idt3="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt3','$idp','$br','$nml3','$tit3','$alm3','$telp3','$kursi')");

              }elseif($r==4){
                $idt4="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt4','$idp','$br','$nml4','$tit4','$alm4','$telp4','$kursi')");

              }else{
                $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }
           }
    

         $sisa=$keberangkatan['sisa']-$jpk;
         $upd=mysqli_query($koneksi,"UPDATE `tb_keberangkatan` SET `sisa`='$sisa' WHERE kd_keberangkatan='$br'");
         
 echo "<script>
     alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
   
     </script>
     ";

    echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
  }


  if($_GET['jp']==5){

          $auto=rand(000001,999999);
          $idp="KD-P".$auto;

          $idu=$_SESSION['us'];
        
          
          $tit1=$_GET['tit1'];
          $nml1=$_GET['nml1'];
          $alm1=$_GET['alm1'];
          $telp1=$_GET['telp1'];

          $tit2=$_GET['tit2'];
          $nml2=$_GET['nml2'];
          $alm2=$_GET['alm2'];
          $telp2=$_GET['telp2'];

          $tit3=$_GET['tit3'];
          $nml3=$_GET['nml3'];
          $alm3=$_GET['alm3'];
          $telp3=$_GET['telp3'];

          $tit4=$_GET['tit4'];
          $nml4=$_GET['nml4'];
          $alm4=$_GET['alm4'];
          $telp4=$_GET['telp4'];

          $tit5=$_GET['tit5'];
          $nml5=$_GET['nml5'];
          $alm5=$_GET['alm5'];
          $telp5=$_GET['telp5'];

          $br=$_GET['br'];
          $jn=$_GET['jn'];
          $jpk=$_GET['jmlk'];
          $tot=$_GET['total'];
          
          $tglp=date('Y-m-d H:i:s');

          $bts=date('Y-m-d H:i:s',strtotime('+2 Hours',strtotime($tglp)));

          $kode=rand(0,999);

           $keberangkatan=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan where kd_keberangkatan='$br'"));
         
          $sql=mysqli_query($koneksi,"INSERT INTO `tb_pesan`(`kd_pesan`, `kd_member`, `status`, `batas_waktu`, `kode`, `jenis`, `jml_kursi`, `total`, `kd_keberangkatan`, `tgl_pesan`) VALUES ('$idp','$idu','Pending','$bts','$kode','$jn','$jpk','$tot','$br','$tglp')");

            $r=1;
            foreach($_GET['kursi'] as $kursi){ 
                $r++;
                if($r==1){
                  $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }elseif($r==2){
                $idt2="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt2','$idp','$br','$nml2','$tit2','$alm2','$telp2','$kursi')");

              }elseif($r==3){
                $idt3="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt3','$idp','$br','$nml3','$tit3','$alm3','$telp3','$kursi')");

              }elseif($r==4){
                $idt4="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt4','$idp','$br','$nml4','$tit4','$alm4','$telp4','$kursi')");

              }elseif($r==5){
                $idt5="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt5','$idp','$br','$nml5','$tit5','$alm5','$telp5','$kursi')");

              }else{
                $idt1="KD-T".rand(000001,999999);
                $sql2=mysqli_query($koneksi,"INSERT INTO `tb_tiket`(`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES ('$idt1','$idp','$br','$nml1','$tit1','$alm1','$telp1','$kursi')");
              }
           }
    

         $sisa=$keberangkatan['sisa']-$jpk;
         $upd=mysqli_query($koneksi,"UPDATE `tb_keberangkatan` SET `sisa`='$sisa' WHERE kd_keberangkatan='$br'");
         
 echo "
     <script>
     alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
   
     </script>
     ";

    echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
  }
  if($_GET['jp']>5){

       echo "
     <script>
     alert('Maaf, anda hanya bisa memesan max 5 tiket.!');
   
     </script>
     ";
    }

  }
     
    ?>