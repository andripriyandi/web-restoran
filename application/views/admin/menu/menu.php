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
            <h1 class="m-0 text-dark">Daftar Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->  <br>
        <a href="<?php echo site_url('dashboard/manage/add_menu') ?>" class="btn btn-primary"><i class="fas fa-plus"> Tambah Menu</i></a>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"> Masakan <i class="fas fa-drumstick-bite"></i> & Minuman <i class="fas fa-cocktail"></i></a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body" style="overflow-x: auto;">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th style="background: #007bff; color: white;">No.</th>
                        <th style="background: #007bff; color: white;">Menu ID</th>
                        <th style="background: #007bff; color: white;">Nama Menu</th>
                        <th style="background: #007bff; color: white;">Harga</th>
                        <th style="background: #007bff; color: white;">Status Menu</th>
                        <th style="background: #007bff; color: white;">Foto</th>
                        <th style="background: #007bff; color: white;">Kategori</th>
                        <th style="background: #007bff; color: white;">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach ($masakan as $row): ?>
                      <tr>
                        <td><?php echo $no++."." ?></td>
                        <td><?php echo $row->id_masakan ?></td>
                        <td><?php echo $row->nama_masakan; ?></td>
                        <td><?php echo "Rp. ".rupiah($row->harga); ?></td>
                        <td>
                          <?php 
                            if ($row->status_masakan == 'Tersedia') {
                              echo "<b class='text-success'> Tersedia</b>";
                            }else{
                              echo "<b class='text-danger'> Kosong</b>";
                            }

                          ?>
                        </td>
                        <td><img src="<?= base_url()?>assets/upload/masakan/<?=$row->image ?>" alt="image" width="70"></td>
                        <td><?php echo $row->kategori ?></td>
                        <td> 
                          <div class="tooltip-demo">
                            <a href="<?php echo site_url('dashboard/masakan/edit/'.$row->id_masakan) ?>" class="btn btn-xs btn-success" title="Edit Data" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit" style="color: #000;"></i></a>
                            <a onclick="deleteConfirm('<?php echo site_url('dashboard/masakan/hapus/'.$row->id_masakan) ?>')" href="#!" class="btn btn-xs btn-danger" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Menu ID</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Status Menu</th>
                        <th>Foto</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                 
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>



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