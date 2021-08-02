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
            <h1 class="m-0 text-dark">Registrasi Member</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Registrasi Member</li>
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
              <table id="registrasi" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>User ID</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($user as $row): ?>
                <tr>
                  <td><?php echo $no++.'.'; ?></td>
                  <td><?php echo $row->id_user; ?></td>
                  <td><?php echo $row->username ?></td>
                  <td><?php echo $row->nama_user ?></td>
                  <td><?php if($row->id_level == '5'){ echo "<b class='text-info'>Pelanggan</b>";} ?></td>
                  <td>
                    <div class="tooltip-demo">
                    <a data-toggle="modal" data-target="#modal-edit<?=$row->id_user;?>" class="btn btn-success btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo site_url('dashboard/registrasi/hapus/'.$row->id_user); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$row->username;?> ?');" class="btn btn-danger btn-xs" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                      </div>
                  </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>User ID</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Level</th>
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
              <h4 class="modal-title">Registrasi Member</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('dashboard/registrasi/simpan') ?>" method="post"> 
                  <input type="hidden" class="form-control" name="id_user" value="<?php echo $kode; ?>">
                  
                  <div class="form-group">
                    <label>Username <small>*</small></label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label>Password <small>*</small></label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Pengguna <small>*</small></label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama Pengguna" required>
                  </div>
                  <div class="form-group">
                        <label>Level <small>*</small></label>
                        <select class="form-control" name="id_level">
                          <option>--Level--</option>
                          <option value="5">Pelanggan</option>
                        </select>
                  </div>
                  <p style="color:#9C9C9C;margin-top: 5px">
                    <i>*) Field Wajib Diisi</i>
                  </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
      <!-- Modal Edit User-->
<?php $no=0; foreach($user as $row): $no++; ?>
      <div class="modal fade" id="modal-edit<?=$row->id_user;?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo site_url('dashboard/registrasi/edit') ?>" method="post">
                  <input type="hidden" readonly value="<?=$row->id_user;?>" name="id_user" class="form-control" > 
                  <div class="form-group">
                    <label>Username <small>*</small></label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row->username; ?>" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>Password <small>*</small></label>
                    <input type="password" class="form-control" name="password" value="<?php echo $row->password; ?>" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Pengguna <small>*</small></label>
                    <input type="text" class="form-control" name="nama_user" value="<?php echo $row->nama_user; ?>" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>Level <small>*</small></label>
                    <select class="form-control" name="id_level" autocomplete="off" required>
                      <option value="<?php echo $row->id_level ?>">
                        <?php  
                        if($row->id_level == '5'){
                          echo "Pelanggan";
                        }else{
                          echo "";
                        } 
                      ?>
                      </option>
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

<?php $this->load->view('admin/_partials/footer') ?>
<?php $this->load->view('admin/_partials/js') ?>

<script type="text/javascript">
  $(document).ready(function () {
    var registrasi = $('#registrasi').DataTable({})
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