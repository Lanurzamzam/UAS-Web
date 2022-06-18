<?php
// Dibuat Oleh Nopen Rianto
// Email : nopen.rianto@gmail.com
date_default_timezone_set("Asia/Jakarta");


if (! function_exists('img_thumb')) {
  function img_thumb($images){
    $ex=explode("/",$images);
    $im=implode("/",array_splice($ex,0,-1));
    $im2=implode("/",array_splice($ex,0,1));
    $hasil=$im."/thumbs/".$im2;
    return $hasil;
  }
}
if (! function_exists('hp')) {
 function hp($nohp) {
     // kadang ada penulisan no hp 0811 239 345
     $nohp = str_replace(" ","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace("(","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace(")","",$nohp);
     // kadang ada penulisan no hp 0811.239.345
     $nohp = str_replace(".","",$nohp);
 
     // cek apakah no hp mengandung karakter + dan 0-9
     if(!preg_match('/[^+0-9]/',trim($nohp))){
         // cek apakah no hp karakter 1-3 adalah +62
         if(substr(trim($nohp), 0, 3)=='+62'){
             $hp = trim($nohp);
         }
         // cek apakah no hp karakter 1 adalah 0
         elseif(substr(trim($nohp), 0, 1)=='0'){
             $hp = '+62'.substr(trim($nohp), 1);
         }
     }
     return $hp;
 }
}
 
if (! function_exists('clear_all_tags')) {
  function clear_all_tags($isi){
    $result = str_replace(array("\r","\n"),"",$isi);
    $result2=preg_replace("/\r|\n/", "", $result);
    $hasil=strip_tags($result2);
    return $hasil;
  }
}

if (! function_exists('tgl_indo')) {
  function tgl_indo($tanggal){
  	$tgl=date('d',strtotime($tanggal)); 
  	$bln=date('m',strtotime($tanggal));
  	$thn=date('Y',strtotime($tanggal));  
  	$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  	$bln_indo=$nama_bln[$bln-0];
  	$hasil=$tgl." ".$bln_indo." ".$thn;
  	return $hasil;

  }
}

if (! function_exists('tanggal_lokal')) {
  function tgl_lokal($tgl, $tampil_hari = false)
  {
        $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
        $nama_bulan = array(
               1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
               "September", "Oktober", "November", "Desember"
        );
        $tahun = substr($tgl, 0, 4);
        $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
        $tanggal = substr($tgl, 8, 2);
        $text = "";
        if ($tampil_hari) {
             $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
             $hari = $nama_hari[$urutan_hari];
             $text .= $hari . ", ";
         }
             $text .= $tanggal . " " . $bulan . " " . $tahun;
             return $text;
  }
}

if (! function_exists('tgl_eng')) {
  function tgl_eng($tanggal){
    $hasil=date('d F Y H:i',strtotime($tanggal));
    return $hasil;

  }
}

if (! function_exists('tgl_en')) {
  function tgl_en($tanggal){
    $hasil=date('Y-m-d',strtotime($tanggal));
    return $hasil;

  }
}

if (! function_exists('nm_hari')) {
  function nm_hari($tanggal){
  	$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
  	$hari = date("w",strtotime($tanggal));
  	$hasil = $seminggu[$hari-0];
  	return $hasil;

  }
}

if (! function_exists('tgl')) {
  function tgl($tanggal){
  	$hasil=date('d',strtotime($tanggal)); 
  	return $hasil;

  }
}

if (! function_exists('bln3')) {
  function bln3($tanggal){
  	$hasil=date('M',strtotime($tanggal)); 
  	return $hasil;

  }
}

if (! function_exists('potong')) {
  function potong($isi,$panjang){
  	$kalimat=strip_tags($isi);
      $isib=explode(" ",$kalimat);
      $hasil=implode(" ",array_splice($isib,0,$panjang)); 
      return $hasil;
  }
}

if (! function_exists('rupiah')) {
  function rupiah($angka){
      $hasil=number_format($angka,0,".",".");
      return $hasil;
  }
}

if (! function_exists('terbilang')) {
  function terbilang($angka) {
     $angka=abs($angka);
     $baca =array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
   
     $terbilang="";
      if ($angka < 12){
          $terbilang= " " . $baca[$angka];
      }
      else if ($angka < 20){
          $terbilang= terbilang($angka - 10) . " belas";
      }
      else if ($angka < 100){
          $terbilang= terbilang($angka / 10) . " puluh" . terbilang($angka % 10);
      }
      else if ($angka < 200){
          $terbilang= " seratus" . terbilang($angka - 100);
      }
      else if ($angka < 1000){
          $terbilang= terbilang($angka / 100) . " ratus" . terbilang($angka % 100);
      }
      else if ($angka < 2000){
          $terbilang= " seribu" . terbilang($angka - 1000);
      }
      else if ($angka < 1000000){
          $terbilang= terbilang($angka / 1000) . " ribu" . terbilang($angka % 1000);
      }
      else if ($angka < 1000000000){
         $terbilang= terbilang($angka / 1000000) . " juta" . terbilang($angka % 1000000);
      }
         return $terbilang;
  }
}

if (! function_exists('avatar')) {
  function avatar($avatar){
    if(!empty($avatar)){  
    if(substr($avatar,0,4)=="http" or substr($avatar,0,4)=="www."){
        $hasil=$avatar;
    }else{
        $hasil=asset('images/profil-pic/').'/'.$avatar;
    }
    }else{
        $hasil=asset('images/profil-pic/').'/intvatar.jpg';
    }
    return $hasil;

  }
}

if (! function_exists('cbahasa')) {
  function cbahasa($id,$en){
     if(app()->getLocale()=="id"){
        $bhs=$id;
      }else{
        if(empty($en)){
          $bhs=$id;
        }else{
          $bhs=$en;                    
        }
      }
      return $bhs;
    }
  }

if (! function_exists('meta_date')) {
  function meta_date($date){
     $date=date(DATE_W3C, strtotime($date));
      return $date;
  }
}

if (! function_exists('alternate')) {
  function alternate($url,$lang){
    $bhs=$lang=='en' ? 'id' : 'en';
   
    $segments = str_replace(url('/'), '', $url);
    $segments = array_filter(explode('/', $segments));
    array_shift($segments);
    array_unshift($segments, $bhs);
    $hasil=url('/').'/'.implode('/', $segments);
    return $hasil;
  }
}

if (! function_exists('alternate_EN')) {
  function alternate_EN($url,$lang){
    $bhs=$lang=='en' ? 'en' : 'en';
   
    $segments = str_replace(url('/'), '', $url);
    $segments = array_filter(explode('/', $segments));
    array_shift($segments);
    array_unshift($segments, $bhs);
    $hasil=url('/').'/'.implode('/', $segments);
    return $hasil;
  }
}
if (! function_exists('cbk')) {
  function cbk($id,$en){
   
        if(empty($en)){
          $bhs=$id;
        }else{
          $bhs=$en;                    
        }
      
      return $bhs;
    }
}

if (! function_exists('iweb')) {
  function iweb(){
    $kontak=DB::table('kontaks')->first();
    return $kontak;
  }
}


?>