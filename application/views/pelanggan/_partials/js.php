<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/') ?>dist/js/adminlte.min.js"></script>

<script>
  // 1 detik = 1000
  window.setTimeout("waktu()",1000);  
  function waktu() {   
  var tanggal = new Date();  
  setTimeout("waktu()",1000);  
  document.getElementById("jam").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
  }
</script>

<script>
  var tanggallengkap = new String();
  var namahari = ("Minggu Senin Selasa Rabu Kamis Jum'at Sabtu");
  namahari = namahari.split(" ");
  var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
  namabulan = namabulan.split(" ");
  var tgl = new Date();
  var hari = tgl.getDay();
  var tanggal = tgl.getDate();
  var bulan = tgl.getMonth();
  var tahun = tgl.getFullYear();
  document.getElementById("tanggal").innerHTML = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
</script>


</body>
</html>