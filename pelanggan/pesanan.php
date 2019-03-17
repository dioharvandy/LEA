<?php require '../functions.php';

      $pesanan = pesanan("SELECT pesanan.nopesanan, pelanggan.nama, pelanggan.alamat, pelanggan.nohp, buku.kode, buku.judul, buku.harga, pelanggan.jumlah_pesanan, pesanan.tanggal FROM pesanan JOIN buku ON buku.kode = pesanan.kode JOIN pelanggan ON pelanggan.kode_pelanggan = pesanan.kode_pelanggan ORDER BY pesanan.nopesanan DESC LIMIT 1"); 	


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Officer</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="fixed">Last Orders
<a href="index.php" class="order">|	Products</a>
<a href="../"><img src="../img/1.png" class="order1" title="Home"></a>
</div>

<div class="produk" style="overflow-x: auto;">
	
<table border="0" cellspacing="0" cellpadding="10">

				<tr>	
						<th>No Pesanan</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No Telfon</th>
						<th>Kode Buku</th>
						<th>Judul</th>
						<th>Harga</th>
						<th>Jumlah Pesanan</th>
           				<th>Tanggal Pesanan</th>
           				<th></th>
				</tr>
				<?php sort($pesanan); foreach($pesanan as $pesan) : ?>
				<tr class="tr">	
							<td><?= $pesan["nopesanan"]; ?></td>
							<td><?= $pesan["nama"]; ?></td>
							<td><?= $pesan["alamat"]; ?></td>
							<td><?= $pesan["nohp"]; ?></td>
							<td><?= $pesan["kode"]; ?></td>
							<td><?= $pesan["judul"]; ?></td>
							<td><?= $pesan["harga"];  ?></td>
              				<td><?= $pesan["jumlah_pesanan"]; ?></td>
              				<td><?= $pesan["tanggal"]; ?></td>
              				<td><a href="editp.php?nopesanan=<?= $pesan["nopesanan"] ?>" class="edit">Edit</a></td>
				</tr>
				<?php 	endforeach; ?>
				</table>
</div>
</body>
</html>