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
            <h1 class="m-0 text-dark">Edit Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/manage/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Menu</li>
              <li class="breadcrumb-item active"><?php echo $masakan->id_masakan ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-md-9">
        <div class="card card-primary card-outline">
          <!-- /.box-header -->
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

              <form action="<?php echo base_url('dashboard/masakan/edit') ?>" method="post" enctype="multipart/form-data" >
              <input type="hidden" name="id" value="<?php echo $masakan->id_masakan ?>" />
              <div class="form-group">
                <label>Nama Menu</label>
                <input class="form-control" type="text" name="nama_masakan" value="<?php echo $masakan->nama_masakan ?>">
              </div>

              <div class="form-group">
                <label>Harga</label>
                <input class="form-control" type="number" name="harga" min="0" value="<?php echo $masakan->harga ?>" required>
              </div>

              <div class="form-group">
                <label>Status Menu</label>
                <select class="form-control" name="status_masakan" required>
                      <option><?php echo $masakan->status_masakan ?></option>
                      <option>
                        <?php
                          if ($masakan->status_masakan == "Tersedia") {
                             echo "Kosong";
                           }else{
                            echo "Tersedia";
                           } 

                         ?>
                      </option>
                      
                </select>
              </div>

              <div class="form-group">
                <label>Foto</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                    <input type="hidden" name="old_image" value="<?php echo $masakan->image ?>">
                    <label class="custom-file-label" for="customFile">Pilih File</label>
                </div>
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori" required>
                      <option value="<?php echo $masakan->kategori ?>"><?php echo $masakan->kategori ?></option>
                      <option value="Masakan">Masakan</option>
                      <option value="Minuman">Minuman</option>
                </select>
              </div>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <!-- /.box-header -->
          <div class="card-body">
            <button type="submit" class="btn btn-block btn-success">Simpan</button>
            <a href="<?php echo base_url('dashboard/manage/menu') ?>" class="btn btn-block btn-info">Batal</a>
          </div>
        </div>
        </form>     
      </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/_partials/footer') ?>
<?php $this->load->view('admin/_partials/js') ?>

<script type="text/javascript">
  $(document).ready(function () {
    var datauser = $('#datauser').DataTable({})
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