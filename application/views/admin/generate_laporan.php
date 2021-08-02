<?php $this->load->view('admin/_partials/meta') ?>
<?php $this->load->view('admin/_partials/nav') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Generate Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Generate Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> 
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <?php foreach ($total_tahun as $key): ?> 
                <span class="info-box-text">PENGHASILAN TAHUN INI</span>
                <span class="info-box-number"><?php echo "RP. ".rupiah($key->total_bayar) ?></span>
                <?php endforeach ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <?php foreach ($total_bulan as $value): ?>
                <span class="info-box-text">PENGHASILAN BULAN INI</span>
                <span class="info-box-number"><?php echo "RP. ".rupiah($value->total_bayar) ?></span>
                <?php endforeach ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <?php foreach ($total_minggu as $val): ?>
                <span class="info-box-text">PENGHASILAN MINGGU INI</span>
                <span class="info-box-number"><?php echo "RP. ".rupiah($val->total_bayar) ?></span>
                <?php endforeach ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <a href="<?=site_url('dashboard/laporan/cetak_transaksi')?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Semua</a>
              </div>
              <div class="card-body">
                <table id="transaksi" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>ID Transakasi</th>
                  <th>ID User</th>
                  <th>ID Order</th>
                  <th>Tanggal</th>
                  <th>Total Bayar</th>
                  <th>Bayar</th>
                  <th>Kembalian</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($all as $row): ?>
                    <tr>
                     <td><?php echo $no++.'.'; ?></td>
                     <td><?php echo "<b style='color: red;'> $row->id_transaksi </b>"; ?></td>
                     <td><?php echo "<b style='color: red;'> $row->id_user </b>"; ?></td>
                     <td><?php echo "<b style='color: red;'> $row->id_order </b>"; ?></td>
                     <td><?php echo $row->tanggal_transaksi; ?></td>
                     <td><?php echo "Rp. ".rupiah($row->total_bayar); ?></td>
                     <td><?php echo "Rp. ".rupiah($row->bayar); ?></td>
                     <td><?php echo "RP. ".rupiah($row->kembalian) ?></td>
                     <td> 
                        <div class="tooltip-demo">
                        <a href="<?php echo site_url('dashboard/laporan/cetak_struk/'.$row->id_transaksi); ?>" class="btn btn-warning btn-xs" data-popup="tooltip" data-placement="top" title="Cetak Struk" target="_blank"><i class="fa fa-print"></i></a>
                        </div>
                     </td>
                    </tr> 
                  <?php endforeach ?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>ID Transakasi</th>
                  <th>ID User</th>
                  <th>ID Order</th>
                  <th>Tanggal</th>
                  <th>Total Bayar</th>
                  <th>Bayar</th>
                  <th>Kembalian</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php $this->load->view('admin/_partials/footer') ?>
<?php $this->load->view('admin/_partials/js') ?>

<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#laporan').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>

<script type="text/javascript">
    $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
    </script>

    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-popup=tooltip]",
        container: "body"
    })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    var transaksi = $('#transaksi').DataTable({})
  });
</script>

</body>
</html>