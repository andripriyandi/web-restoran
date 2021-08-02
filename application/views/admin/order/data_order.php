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
            <h1 class="m-0 text-dark">Data Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/order') ?>"> Entri Order</a></li>
              <li class="breadcrumb-item active">Data Order</li>
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
          <div class="card card-secondary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?php echo base_url('dashboard/manage/order') ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="overflow-x: auto;">
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
              <table id="dataorder" class="table table-bordered table-striped table-hover display nowrap">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>ID Order</th>
                  <th>No Meja</th>
                  <th>Tanggal</th>
                  <th>ID User</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($order as $row): ?>
                <tr>
                  <td><?php echo $no++.'.'; ?></td>
                  <td><?php echo $row->id_order ?></td>
                  <td><?php echo $row->no_meja ?></td>
                  <td><?php echo $row->tanggal ?></td>
                  <td><?php echo $row->id_user ?></td>
                  <td><?php echo $row->keterangan ?></td>
                  <td>
                    <?php 
                      if ($row->status_order == "Dipesan") {
                        echo "<b class='text text-primary'>Dipesan</b>";
                      }elseif ($row->status_order == "Belum Bayar") {
                        echo "<b class='text text-danger'>Belum Bayar</b>";
                      }else{
                        echo "<b class='text text-success'>Dibayar</b>"; 
                      }
                     ?>
                  </td>
                  <td> 
                    <div class="tooltip-demo">
                    <a data-toggle="modal" data-target="#modal-edit<?=$row->id_order ?>" class="btn btn-success btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo site_url('dashboard/manage/detail_order/'.$row->id_order); ?>" class="btn btn-xs btn-info" title="Detail Order" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo site_url('dashboard/entri_order/hapus/'.$row->id_order); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$row->id_order;?> ?');" class="btn btn-danger btn-xs" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>ID Order</th>
                  <th>No Meja</th>
                  <th>Tanggal</th>
                  <th>ID User</th>
                  <th>Keterangan</th>
                  <th>Status</th>
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
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Entri Order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('dashboard/entri_order/simpan') ?>" method="post">
                <input type="hidden" class="form-control" name="id_order" value="<?php echo $kode; ?>">
                  <div class="form-group">
                    <label>No Meja <small>*</small></label>
                    <input type="number" class="form-control" name="no_meja" placeholder="No Meja" required>
                  </div>
                  <div class="form-group">
                    <label>ID User <small>*</small></label>
                    <select class="form-control" name="id_user">
                      <option>--Pilih ID User--</option>
                      <?php foreach ($user as $row): ?>
                      <option><?php echo $row->id_user ?></option>
                      <?php endforeach ?>
                    </select>
                 </div>
                  <div class="form-group">
                    <label>Keterangan <small>*</small></label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Status <small>*</small></label>
                    <select class="form-control" name="status_order">
                      <option>--Status--</option>
                      <option value="Dipesan">Dipesan</option>
                      <option value="Belum Bayar">Belum Bayar</option>
                      <option value="Dibayar">Dibayar</option>
                    </select>
                 </div>
                  <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- Modal Edit User-->
<?php $no=0; foreach($order as $row): $no++ ?>
      <div class="modal fade" id="modal-edit<?=$row->id_order;?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo site_url('dashboard/entri_order/edit') ?>" method="post">
                  <input type="hidden" readonly value="<?php echo $row->id_order ?>" name="id_order" class="form-control" > 
                  <div class="form-group">
                    <label>No Meja</label>
                    <input type="text" class="form-control" name="no_meja" value="<?php echo $row->no_meja ?>" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="datetime" class="form-control" name="tanggal" value="<?php echo $row->tanggal ?>" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>ID User <small>*</small></label>
                    <select class="form-control" name="id_user">
                      <option value="<?php echo $row->id_user ?>"><?php echo $row->id_user ?></option>
                      <?php foreach ($user as $value): ?>
                        <option value="<?php echo $value->id_user ?>"><?php echo $value->id_user ?></option>
                      <?php endforeach ?>
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $row->keterangan ?>" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>Status <small>*</small></label>
                    <select class="form-control" name="status_order">
                      <option value="<?php echo $row->status_order ?>"><?php echo $row->status_order ?></option>
                      <option value="Dipesan">Dipesan</option>
                      <option value="Belum Bayar">Belum Bayar</option>
                      <option value="Dibayar">Dibayar</option>
                    </select>
                 </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php endforeach; ?>


    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/_partials/footer') ?>
<?php $this->load->view('admin/_partials/js') ?>

<script type="text/javascript">
  $(document).ready(function () {
   $('#dataorder').DataTable({
    })
  });
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
</body>
</html>