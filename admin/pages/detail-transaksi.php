  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Transaksi
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Detail Transaksi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Transaksi Kode Pesan <b><?php echo $_GET['kd']; ?></b></h3>
                   <?php
                       include './../config/koneksi.php';
                       $id=$_GET['kd']; 
                     
                    $tt=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_tiket WHERE kd_pesan='$_GET[kd]'"));
                    $sqlq=mysqli_query($koneksi,"SELECT * FROM tb_pesan where kd_pesan='$_GET[kd]'");

                     $qq=mysqli_fetch_array($sqlq);

                     $tobay=$qq['total']+$qq['kode'];
                      
                        

                     ?>
                     <br>
                     <br>
                  <h3 class="box-title">- Total Yang harus dibayar : <b>Rp <?php echo number_format($tobay,0,".",".");  ?></b></h3> 
                  <br> 

                  <hr> 
                  <?php if($qq['status'] !='Lunas'){ ?>
                   <a href="./pages/konfirmasi-pemesanan.php?id=<?php echo $qq['kd_pesan']; ?>" onclick="return confirm('Anda yakin ingin mengkonfirmasi pemesanan ini.?')" class="btn btn-warning"><i class="fa fa-check"></i> Set Lunas</a>
                 <?php } ?>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <div class="table-responsive">
                     
                  <table class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Bukti Transaksi</th>
                        <th>KD Konfirmasi</th>
                        <th>Nomor Rekening</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../config/koneksi.php';
                       $id=$_GET['kd']; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_konfirmasi where kd_pesan='$id'");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                        

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><a href="../assets/images/transaksi/<?php echo $q['bukti_transaksi']; ?>" target="_blank"><img src="../assets/images/transaksi/<?php echo $q['bukti_transaksi']; ?>" alt="" width="100" height="100"></a></td>
                        <td><?php echo $q['kd_konfirm']; ?></td>
                        <td><?php echo $q['rekening']; ?></td>
                      </tr>

                  <?php } ?>
                
                    </tbody>
                  </table>
                   
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->