  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pemesanan Sukses
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Pemesanan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pemesanan Sukses</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">   
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Tiket</th>
                        <th>Transaksi</th>
                        <th>KD Pesan</th>
                        <th>Member</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Kode Trans.</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../config/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tb_pesan.jml_kursi as jm,tb_pesan.*,tb_keberangkatan.*,tb_member.*,tb_jadwal.*,tb_tujuan.* FROM tb_pesan,tb_keberangkatan,tb_member,tb_jadwal,tb_tujuan where tb_pesan.kd_keberangkatan=tb_keberangkatan.kd_keberangkatan and tb_pesan.status='Lunas' and tb_pesan.kd_member=tb_member.kd_member and tb_keberangkatan.kd_tujuan=tb_tujuan.kd_tujuan and tb_jadwal.kd_jadwal=tb_keberangkatan.kd_jadwal ORDER BY tb_pesan.tgl_pesan DESC");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="home.php?p=detail-pemesanan&kd=<?php echo $q['kd_pesan']; ?>" class="btn btn-info">Tiket</a></td>
                        <td><a href="home.php?p=detail-transaksi&kd=<?php echo $q['kd_pesan']; ?>" class="btn btn-success">Transaksi</a></td>
                        <td><?php echo $q['kd_pesan']; ?></td>
                         <td><?php echo $q['nama']; ?></td>
                          <td><?php echo $q['tgl_berangkat']; ?>, <?php echo $q['jadwal']; ?></td>
                          <td><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></td>
                          <td><?php echo $q['kode']; ?></td>
                          <td><?php echo $q['jm']; ?></td>
                          <td><?php echo $q['total']; ?></td>
                          <td><?php echo $q['tgl_pesan']; ?></td>
                         <td>
                         
                        </td>
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