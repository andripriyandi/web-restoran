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
            <h1 class="m-0 text-dark">Entri Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Entri Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-plus"></i> Tambah
                </button>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php 
                  $data=$this->session->flashdata('sukses');
                  if($data!=""){ ?>
                    <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
              <?php } ?>

              <?php 
                  $data2=$this->session->flashdata('error');
                  if($data2!=""){ ?>
                    <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
              <?php } ?>
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
                        <a href="<?php echo site_url('dashboard/entri_transaksi/hapus/'.$row->id_transaksi); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$row->id_transaksi;?> ?');" class="btn btn-danger btn-xs" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>


        <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Entri Transaksi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('dashboard/entri_transaksi/simpan') ?>" method="post"> 
                <div class="form-group">
                    <label>ID Transaksi <small>*</small></label>
                    <input type="text" class="form-control" name="id_transaksi" style="font-weight: bold; color: red;" value="<?php echo $kode; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>ID User <small>*</small></label>
                    <select class="form-control" name="id_user" required>
                      <option value="">--Pilih ID User--</option>
                      <?php foreach ($user as $row): ?>
                      <option><?php echo $row->id_user ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>ID Order <small>*</small></label>
                    <select class="form-control" name="id_order" required>
                      <option value="">--Pilih ID Order--</option>
                      <?php foreach ($order as $value): ?>
                      <option><?php echo $value->id_order ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Total Bayar <small>*</small></label>
                    <input type="text" class="form-control" name="total_bayar" placeholder="Total Bayar" id="total" required>
                  </div>
                  <div class="form-group">
                    <label for="">Bayar <small>*</small></label>
                    <input type="number" class="form-control" name="bayar" id="bayar" placeholder="Jumlah Bayar">
                  </div>
                  <div class="form-group">
                    <label for="">Kembalian</label>
                    <input type="number" class="form-control" name="kembalian" id="kembalian" readonly>
                  </div>
                  <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/_partials/footer') ?>
<?php $this->load->view('admin/_partials/js') ?>

<script type="text/javascript">
  $(document).ready(function () {
    var transaksi = $('#transaksi').DataTable({})
  });
</script>
<script type="text/javascript">
    $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
</script>
<script type="text/javascript">
  $(document).ready(function(){
        $('#bayar').keyup(function(){
        var bayar = $(this).val();
        var total = $('#total').val();
        var kembalian = bayar - total;
        $('#kembalian').val(kembalian);
        });
    })
</script>
 <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-popup=tooltip]",
        container: "body"
    })
</script>
</body>
</html>