<?php $this->load->view('pelanggan/_partials/meta') ?>
<?php $this->load->view('pelanggan/_partials/nav') ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" height="310" src="<?php echo base_url('assets/images/poster_1.png') ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" height="310" src="<?php echo base_url('assets/images/poster_2.png') ?>" alt="Second slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-12">
          <div class="card card-secondary card-outline">
          <div class="card-header">
            <div class="col-md-5 float-right" >
              <form action="<?php echo base_url('pelanggan/manage/') ?>" class="form-horizontal" method="get">
                <div class="input-group">
                  <input type="text" name="cari" placeholder="Cari..." class="form-control" required>
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body">
            <h4>Daftar Menu</h4>
            <div class="row">
              <div class="col-3 col-sm-2">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Masakan</a>
                  <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Minuman</a>
                </div>
              </div>
              <div class="col-7 col-sm-10">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">

                      <div class="row">
                      <?php foreach ($masakan as $value): ?>
                      <div class="col-sm-4">
                        <div class="card" >
                          <img class="card-img-top" src="<?= base_url()?>assets/upload/masakan/<?=$value->image ?>" alt="Card image cap" height="250">
                          <div class="card-body">
                            <p><span class="badge <?php if($value->status_masakan == "Tersedia"){ echo "bg-success";}else{echo "bg-danger";} ?>"><?php echo $value->status_masakan ?></span></p>
                            <h5 class="card-title"><?php echo $value->nama_masakan ?></h5>
                            <p class="card-text text-secondary"><b><?php echo "Rp. ".rupiah($value->harga); ?></b></p><hr>
                            <a href="<?php echo base_url('pelanggan/manage/pesan/'.$value->id_masakan) ?>" class="btn btn-success col-12">Pesan</a>
                          </div>
                        </div>
                      </div>
                      <?php endforeach ?>
                      </div>

                      <div class='container'>
                         <!--Tampilkan pagination-->
                          <?php echo $pagination; ?>
                      </div>
          
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    <div class="row">
                      <?php foreach ($minuman as $value): ?>
                      <div class="col-sm-4">
                        <div class="card" >
                          <img class="card-img-top" src="<?= base_url()?>assets/upload/masakan/<?=$value->image ?>" alt="Card image cap" height="250">
                          <div class="card-body">
                            <p><span class="badge <?php if($value->status_masakan == "Tersedia"){ echo "bg-success";}else{echo "bg-danger";} ?>"><?php echo $value->status_masakan ?></span></p>
                            <h5 class="card-title"><?php echo $value->nama_masakan ?></h5>
                            <p class="card-text text-secondary"><b><?php echo "Rp. ".rupiah($value->harga); ?></b></p><hr>
                            <a href="<?php echo base_url('pelanggan/manage/pesan/'.$value->id_masakan) ?>" class="btn btn-success col-12">Pesan</a>
                          </div>
                        </div>
                      </div>

                      <?php endforeach ?>
                      </div>
                  </div>
  
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
      </div>
        </div>

        <!-- /.row -->
    </div>
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('pelanggan/_partials/footer') ?>
<?php $this->load->view('pelanggan/_partials/js') ?>