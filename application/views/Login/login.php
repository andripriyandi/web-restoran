<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Mam-mam</title>
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
  <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/')?>css/coming-soon.min.css" rel="stylesheet">

</head>

<body>
  <div class="overlay" style="background-image: url('../assets/images/bg_3.jpg');"></div>

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <h1>Mam-mam</h1>
            <div class="input-group input-group-newsletter">
              <form action="<?php echo base_url('login') ?>" method="post">
                <br>
                <?php
                    // Cek apakah terdapat session nama message
                    if($this->session->flashdata('message')){ // Jika ada
                    echo $this->session->flashdata('message'); // Tampilkan pesannya
                  }
                ?>
                <label>Username</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-user-astronaut"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" size="50" name="username" required>
                </div>

                <label>Password</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" size="50" name="password" required>
                  </div><br>
                  <button class="btn btn-secondary mb-4" type="submit"><i class="fa fa-sign-in-alt"></i> Login</button>
                  <button class="btn btn-danger mb-4" type="reset"><i class="fa fa-redo"></i> Ulangi</button>
              </form>
            </div>
            <a href="<?php echo base_url('auth') ?>"> << Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url('assets/')?>js/coming-soon.min.js"></script>
</body>
</html>
