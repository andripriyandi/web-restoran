<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?php echo base_url('assets/') ?>images/favicon.png" alt="Mam-mam Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text" style="color: #c8a97e; font-family: Great Vibes, cursive; font-size: 23px;">Mam-mam</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
              <b id="tanggal" style="color: white;"></b>&nbsp; <b style="color: white;">-</b> &nbsp;
              <b id="jam" style="color: white;"></b>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-shopping-cart"></i>          
          </a>
        </li>
        <li>
          <a class="nav-link" href="<?php echo base_url('dashboard/manage/logout') ?>">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <div class="modal fade" id="modal-default" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Daftar Pesanan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered text-center">
                  <thead>                  
                    <tr>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($order) > 0){ ?>
                    <?php $sub_total = 0; $no=1; foreach ($order as $key): 
                      $sub_total = $sub_total + $key->total_harga;
                    ?>

                    <tr> 
                      <td><?php echo $no++."."; ?></td>
                      <td><?php echo $key->nama_masakan ?></td>
                      <td ><?php echo $key->jumlah ?></td>
                      <td><?php echo "Rp. ".rupiah($key->harga) ?></td>
                      <td><?php echo "Rp. ".rupiah($key->total_harga) ?></td>
                      <td><a href="<?php echo base_url('pelanggan/entri_order/hapus/'.$key->id_order) ?>" class="btn btn-danger btn-sm">Batal Beli</a></td>
                    </tr>
                    <tr>
                      
                    </tr>
                    <?php endforeach ?>
                    <?php }else{ ?>
                      <td colspan="7" class="text-center"><h3>Anda Belum order</h3></td>
                    <?php } ?>
                  </tbody>
                </table>
                <?php if (count($order) > 0){ ?>
                <div class="float-right">
                  <b>Sub Total : <?php echo "Rp. ".rupiah($sub_total) ?></b>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer justify-content-right">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->