  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Pemesanan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Detail Pemesanan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Pemesanan kode <b><?php echo $_GET['kd']; ?></b></h3> 
                  <hr> 
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <div class="table-responsive">
                     
                   <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Tiket</th>
                        <th>Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Nama Penumpang</th>
                        <th>Nomor Kursi</th>
                         <th>Telp</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       
                              
                             $sql=mysqli_query($koneksi,"SELECT * FROM tb_tiket a LEFT JOIN tb_keberangkatan b ON a.kd_keberangkatan=b.kd_keberangkatan LEFT JOIN tb_kursi c ON c.kd_kursi=a.kd_kursi LEFT JOIN tb_tujuan d ON d.kd_tujuan=b.kd_tujuan LEFT JOIN tb_jadwal e ON b.kd_jadwal=e.kd_jadwal LEFT JOIN tb_pesan f ON f.kd_pesan=a.kd_pesan WHERE f.status='Lunas' ORDER BY c.no_kursi ASC");
                                 
                        
                        $no=0;$total=0;
                  
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                        $total=$q['total'];

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_tiket']; ?></td>
                        <td><?php echo $q['dari']; ?> - <?php echo $q['tujuan']; ?></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_berangkat'])); ?>, <?php echo date("H:i a",strtotime($q['jadwal'])); ?></td>
                        
                        <td><?php echo $q['nm_penumpang']; ?></td>
                        <td><?php echo $q['no_kursi']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                        <td><?php echo $q['alm']; ?></td>
                        <td>Rp <?php echo number_format($q['harga']); ?></td>
                    
                      </tr>

                  <?php } ?>
                 
               
                    </tbody>
                    <tfoot>
                       <tr>
                    <td  colspan="8"><b>TOTAL :</b></td>
                    <td><b>Rp <?php echo number_format($total,0,".","."); ?></b></td>
                  </tr>
                    </tfoot>
                  </table>
                   
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->