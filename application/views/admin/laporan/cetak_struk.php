<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Theme style -->
  	<link rel="stylesheet" href="<?php echo base_url('assets/backend/') ?>dist/css/adminlte.min.css">
    <title>Cetak Struk</title>
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
    <h3>Struk Pembelian Makanan</h3>	
    <table width="100%">
      <?php foreach ($transaksi as $key): ?>
        <tr> 
            <td colspan="3" class="text-right"><?php echo $key->tanggal_transaksi ?></td>
        </tr>
        <tr> 
            <td width="100px">ID Pelanggan</td>
            <td class="text-right">:</td>
            <td><?php echo $key->id_user ?></td>
        </tr>
        <tr>
            <td>Nama </td>
            <td width="20" class="text-right">:</td>
            <td><?php echo $key->nama_user ?></td>
        </tr>
        <tr>
            <td>No Meja </td>
            <td width="20" class="text-right">:</td>
            <td><?php echo $key->no_meja ?></td>
        </tr>
        <tr>
            <td>Total Bayar </td>
            <td width="20" class="text-right">:</td>
            <td><?php echo "Rp. ".rupiah($key->total_bayar) ?></td>
        </tr>
        <tr>
            <td>Bayar </td>
            <td width="20" class="text-right">:</td>
            <td><?php echo "Rp. ".rupiah($key->bayar) ?></td>
        </tr>
        <tr>
            <td>Kembalian </td>
            <td width="20" class="text-right">:</td>
            <td><?php echo "Rp. ".rupiah($key->kembalian) ?></td>
        </tr>
      <?php endforeach ?>

    </table>
  </body>
</html>
