<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> 
    <?php 
      if ($this->session->userdata('id_level') == '1') {
        echo "Admin";
      }elseif($this->session->userdata('id_level') == '2'){
        echo "Waiter";
      }elseif ($this->session->userdata('id_level') == '3') {
        echo "Kasir";
      }elseif ($this->session->userdata('id_level') == '4') {
        echo "Owner";
      }

    ?> | Dashboard
  </title>

  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/') ?>favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>plugins/toastr/toastr.min.css">

</head>
<body class="hold-transition sidebar-mini">