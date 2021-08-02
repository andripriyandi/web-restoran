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
            <h1 class="m-0 text-dark">Detail Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/manage/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Order</li>
              <?php foreach ($order as $key): ?>
              <li class="breadcrumb-item active"><?php echo $key->id_order ?></li>
              <?php endforeach ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="card card-secondary card-outline">
          <div class="card-header">
              <h3 class="card-title">
                <a href="<?php echo base_url('dashboard/manage/data_order') ?>" class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i> kembali
                </a>
              </h3>
            </div>
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
              
              <form action="<?php echo site_url('dashboard/entri_order/edit_detail') ?>" method="post" enctype="multipart/form-data">
                <?php foreach ($order as $value): ?>

                  <div class="form-group">
                    <label>ID Detail Order</label>
                    <input class="form-control" type="text" name="id_detail_order" value="<?php echo $value->id_detail_order ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>ID Order</label>
                    <input class="form-control" type="text" name="id_order" value="<?php echo $value->id_order ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>ID Masakan</label>
                    <input class="form-control" type="text" name="id_masakan" value="<?php echo $value->id_masakan ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="jumlah" value="<?php echo $value->jumlah ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control" type="text" name="harga" value="<?php echo rupiah($value->harga) ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Total Harga</label>
                    <input class="form-control" type="text" name="harga" value="<?php echo rupiah($value->total_harga) ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status_detail_order">
                      <option><?php echo $value->status_detail_order ?></option>
                      <option>
                        <?php
                          if ($value->status_detail_order == "Pending") {
                             echo "Terkirim";
                           }else{
                            echo "Pending";
                           } 

                         ?>
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan"><?php echo $value->keterangan ?></textarea>
                  </div>
                  
                <?php endforeach ?>
                <div class="float-sm-right">
                  <button type="submit" class="btn btn-success">Ubah</button>
                </div>
              </form>
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
    $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
    </script>

</body>
</html>