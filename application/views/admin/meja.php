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
            <h1 class="m-0 text-dark">Meja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Meja</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-md-4">
        <div class="card card-secondary card-outline">
          <div class="card-header"> 
            <strong>Tambah Meja</strong>
          </div>
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

              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/meja/simpan') ?>">
                <div class="form-group">
                  <label>Masukan No Meja</label>
                  <input type="number" class="form-control" name="no_meja" placeholder="Contoh: 1" required>
                </div>
                <button type="submit" name="getInput" class="btn btn-info"><i class="fa fa-check"></i> Tambah Meja</button>
              </form>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card card-secondary card-outline">
          <!-- /.box-header -->
          <div class="card-header">
            <strong>Data Meja</strong>
          </div>
          <div class="card-body">
            <?php 
                  $data=$this->session->flashdata('berhasil');
                  if($data!=""){ ?>
                    <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
              <?php } ?>
            <div class="row">
              <?php foreach ($meja as $value): ?>
              <div class="col-sm-1">  
                <a style="text-align: center; width: 40px; padding: 6px 0px; height: 40px; font-weight: bold"; href="<?php echo site_url('dashboard/meja/hapus/'.$value->id_meja); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Meja <?=$value->no_meja;?> ?');" data-toggle="tooltip" data-placement="top" data-html="true" title="Delete" class="btn btn-primary"><?php echo $value->no_meja ?></a>
              </div><br><br>
              <?php endforeach ?>
            </div>

          </div>
          </div>
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
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


</body>
</html>