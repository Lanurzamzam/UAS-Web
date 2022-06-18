  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Member
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Laporan Member</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Member</h3>  
                </div><!-- /.box-header -->
                    <div class="box-header">
                    <div class="row">
                      <div class="col-md-12">
                
                          <div class="col-md-1"><a href="./pages/cetak-member.php" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>
                          </div>
                        
                      </div>
                    </div>
                  </div>
                   
                <div class="box-body">
                  <div class="table-responsive">     
              <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Member</th>
                        <th>Nama Member</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aktif</th>
                        <th>Tanggal</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../config/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_member");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kd_member']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                         <td><?php echo $q['jekel']; ?></td>
                          <td><?php echo $q['telp']; ?></td>
                          <td><?php echo $q['email']; ?></td>
                          <td><?php echo $q['password']; ?></td>
                          <td><?php echo $q['aktif']; ?></td>
                          <td><?php echo $q['tgl_daftar']; ?></td>
                        
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