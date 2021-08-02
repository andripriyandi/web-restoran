<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Theme style -->
  	<link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>dist/css/adminlte.min.css">
    <title>Cetak Transaksi</title>
  </head>
  <body>
  	<page backtop='32mm' backbottom='10mm' backleft='2mm' backright='5mm'>
		<page_header>
			<table style='width: 100%; border: solid 0px black;'>
				<tr>
					<td style='width: 85%;'>
						<h2><b>Mam-mam Resto</b></h2>
						<i>Alamat : Jalan Buah Batu No. 59</i>
					</td>
				</tr>
			</table>
			<hr>
	</page_header>
    <h3>Data Transaksi</h3>	
    <table class="table table-bordered text-center">
    	<thead>
    		<tr>
                <th>No.</th>
                <th>ID User</th>
                <th>ID Order</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembalian</th>            
            </tr>
        </thead>
        <tbody>
        	<?php $no=1; foreach ($transaksi as $key): ?>
        		<tr>
        			<td><?php echo $no++;  ?></td>
        			<td><?php echo $key->id_user ?></td>
        			<td><?php echo $key->id_order ?></td>
        			<td><?php echo $key->tanggal_transaksi ?></td>
        			<td><?php echo rupiah($key->total_bayar) ?></td>
        			<td><?php echo rupiah($key->bayar) ?></td>
        			<td><?php echo rupiah($key->kembalian) ?></td>
        		</tr>
        	<?php endforeach ?>
        </tbody>
    	
    </table>
  </body>
</html>
