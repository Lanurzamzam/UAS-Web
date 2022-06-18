<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../config/koneksi.php';

$id=$_GET['kd'];

 $sql1=mysqli_query($koneksi,"UPDATE tb_pesan SET status='Cancel' WHERE kd_pesan='$id'");
	
	if($sql1){
 echo '<script> alert("Pemesanan Berhasil dikonfirmasi."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Pemesanan gagal dikonfirmasi."); javascript:history.back(); </script>';	
	}

  

?>