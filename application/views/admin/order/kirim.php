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
            <h1 class="m-0 text-dark">Entri Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/home') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard/manage/order') ?>">Entri Order</a></li>
              <?php foreach ($masakan as $val): ?>
              <li class="breadcrumb-item"><?php echo $val->id_masakan ?></li>
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
          <div class="col-lg-4">
            <div class="card card-secondary card-outline">
              <div class="card-body">
                <?php foreach ($masakan as $value): ?>
                  <img src="<?php echo base_url('assets/upload/masakan/'.$value->image) ?>" class="img-thumbnail" width="500px">
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-8">
            <div class="card card-secondary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"><?php echo $value->nama_masakan ?></h5>
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
               <form action="<?php echo site_url('dashboard/entri_order/simpan') ?>" method="post" enctype="multipart/form-data"> 
                  <input type="hidden" class="form-control" value="<?php echo $kode; ?>" name="id_order">
                  <input type="hidden" class="form-control" value="<?php echo $kode_do; ?>" name="id_detail_order">
                  <input type="hidden" class="form-control" value="<?php echo $value->id_masakan; ?>" name="id_masakan">
                  <div class="form-group">
                    <label>No Meja</label>
                    <select class="form-control" name="no_meja" required>
                    <option value="">--Pilih Meja--</option>
                    <?php foreach ($meja as $row): ?>
                      <option><?php echo $row->no_meja ?></option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>ID User</label>
                    <select class="form-control" name="id_user" required>
                    <option value="">--Pilih User--</option>
                    <?php foreach ($user as $row): ?>
                      <option><?php echo $row->id_user ?></option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Contoh: 1" required>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" value="<?php echo $value->harga; ?>" class="form-control" id="harga" name="harga">
                  </div>
                  <div class="form-group">
                    <label>Total Harga</label>
                    <input type="number" class="form-control" id="total" name="total_harga">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" name="keterangan" placeholder="Contoh: Jangan lama brow"></textarea>
                  </div>
                <?php endforeach ?>
              </div>
            </div>


            <div class="card">
              <div class="card-body">
                <a href="<?php echo base_url("dashboard/manage/order") ?>" class="btn btn-danger"><i class="fas fa-arrow-left"> Kembali </i></a>
                <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Order</button>
              </div>
            </div>
            </form>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/_partials/footer') ?>
<?php $this->load->view('admin/_partials/js') ?>

<script>
    $(document).ready(function() {
      $("#btnPlus").click(function(){
      var jumlah  = $('#jumlah').val();
      var harga   = $('#harga').val();
      var kali    = harga * jumlah;
    $("#total").val(kali);
      });
      });
      $('#jumlah').keyup(function(){
        var jumlah  = $(this).val();
        var harga   = $('#harga').val();
        var kali    = harga * jumlah;
      $("#total").val(kali);
    });
</script>

<script type="text/javascript">
    $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
</script>

</body>
</html>