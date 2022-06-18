  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tiket Kebrangkatan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Tiket Keberangkatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tiket Keberangkatan</b></h3>
                  <?php
                    include './../config/koneksi.php';
                  
                    
                    $b=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_keberangkatan where kd_keberangkatan='$_GET[br]'"));

                    $sqlj=mysqli_query($koneksi,"SELECT * FROM tb_jadwal where kd_jadwal='$b[kd_jadwal]'");
                    $j=mysqli_fetch_array($sqlj);
                     $sqlt=mysqli_query($koneksi,"SELECT * FROM tb_tujuan where kd_tujuan='$b[kd_tujuan]'");
                    $t=mysqli_fetch_array($sqlt);
                  ?>
               
                  <hr>
                  <p># Tujuan : <?php echo $t['dari'] ?> - <?php echo $t['tujuan']; ?></p>
                  <p># Tanggal : <?php echo date("d F Y",strtotime($b['tgl_berangkat'])); ?></p>
                  <p># Jam : <?php echo date("H:i a",strtotime($j['jadwal'])); ?></p>
                  <p># Total Tiket : <?php echo $b['jml_kursi']; ?> | Sisa : <?php echo $b['sisa']; ?></p>
                  <hr> 
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <div class="table-responsive">
                     
                  <table class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Tiket</th>
                        <th>Title</th>
                        <th>Nama Penumpang</th>
                        <th>Nomor Kursi</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php

                      $no=0;
                   $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_kursi b ON a.kd_kursi=b.kd_kursi WHERE a.kd_keberangkatan='$_GET[br]' ORDER BY b.no_kursi ASC");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                
                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_tiket']; ?></td>
                        <td><?php echo $q['title']; ?></td>
                        <td><?php echo $q['nm_penumpang']; ?></td>
                        <td><b><?php echo $q['no_kursi']; ?></b></td>
                        <td><?php echo $q['alm']; ?></td>
                       <td><?php echo $q['telp']; ?></td>
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