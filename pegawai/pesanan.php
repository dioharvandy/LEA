<?php require '../functions.php';

        session_start();

        if(!isset($_SESSION["login"])){
          header("Location: ../login/");
          exit;
        }
		$pesanan = pesanan("SELECT pesanan.nopesanan, pelanggan.nama, pelanggan.alamat, pelanggan.nohp, buku.kode, buku.judul, buku.harga, pelanggan.jumlah_pesanan, pesanan.tanggal, pelanggan.jumlah_pesanan*buku.harga AS total FROM pesanan JOIN buku ON buku.kode = pesanan.kode JOIN pelanggan ON pelanggan.kode_pelanggan = pesanan.kode_pelanggan");

         if(isset($_POST["submit"])){

          $pesanan = carip($_POST["cari"]);
        
        }
       	


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Officer</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="fixed">Orders
<a href="index.php" class="order">|	Products</a>
<a href="laporan.php" class="order">| Reports</a>
<a href="../" title="Home"><img src="../img/1.png" class="order1"></a>
<a href="../login/logout.php" onclick="return confirm ('Are You Sure?');" class="logout ">Log Out</a>
</div>
<div class="cari">  

<form action="" method="post">
<button type="submit" name="submit" class="cari">Search</button>      
    <input type="text" name="cari" class="cari" placeholder="Masukkan Pencarian" autofocus autocomplete="off">
</form>

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
						<th>Total Harga</th>
           				<th>Tanggal Pesanan</th>
           				<th></th>
				</tr>
				<?php 	foreach($pesanan as $pesan) : ?>
				<tr class="tr">	
							<td><?= $pesan["nopesanan"]; ?></td>
							<td><?= $pesan["nama"]; ?></td>
							<td><?= $pesan["alamat"]; ?></td>
							<td><?= $pesan["nohp"]; ?></td>
							<td><?= $pesan["kode"]; ?></td>
							<td><?= $pesan["judul"]; ?></td>
							<td><?= $pesan["harga"]; ?></td>
              				<td><?= $pesan["jumlah_pesanan"]; ?></td>
              				<td><?= $pesan["total"]; ?></td>
              				<td><?= $pesan["tanggal"]; ?></td>
              				<td><a href="hapusp.php?nopesanan=<?= $pesan["nopesanan"] ?>"  class="hapus" onclick= "return confirm ('Confirm');">Done</a> |
              					<a href="editp.php?nopesanan=<?= $pesan["nopesanan"] ?>" class="edit">Edit</a></td>

				</tr>
				<?php 	endforeach; ?>
				</table>
</div>
</body>
</html>