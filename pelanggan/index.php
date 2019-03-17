  <?php require "../functions.php";
		
	$buku = barang("SELECT * FROM buku");
	
	if(isset($_POST["submit"])){
			pesan();
	}

  if(isset($_POST["cari"])){

     $buku = cari($_POST["cari"]);
        
        }			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Officer</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="fixed">Product
<a href="pesanan.php" class="order">| Last Orders</a>
<a href="../" ><img src="../img/1.png" class="order1" title="Home"></a>
</div>
<div class="cari">  

<form action="" method="post">
<button type="submit" name="cari" class="cari">Search</button>      
    <input type="text" name="cari" class="cari" placeholder="Masukkan Pencarian" autofocus autocomplete="off">
</form>

</div>
<div class="produk" style="overflow-x: auto;">
		<?php 	foreach($buku as $buks): ?>
		<div class="buku">
		<img src="../pegawai/img/<?= $buks["gambar"]; ?>" class = "img">
		<p>Kode : <?= $buks["kode"]; ?></p>
		<p style="font-size: 19px;">	<?= $buks["judul"]; ?></p>
		<p>	<?= $buks["penulis"]; ?></p>
		<p>Rp.<?= $buks["harga"]; ?>	</p>
		<p>Tersedia	: <?= $buks["jumlah"]; ?></p>
		</div>
		<?php 	endforeach; ?>	
</div>
<div class="pesanan">	

		       <form action="" method="post">
          <link rel="stylesheet" href="../pegawai/style.css">
            <li>
            <label for="nama" class="lab">Nama</label>
            <input type="text" name="nama" id="nama" class="butt" autofocus>
            </li>
            <li>
              <label  for="alamat" class="lab">Alamat</label>
              <input class="butt" type="text" name="alamat" id="alamat">
            </li>
            <li>
              <label for="nohp" class="lab">No Telpon</label>
              <input class="butt" type="text" name="nohp" id="nohp">
            </li>
            <li>
              <label for="kode" class="lab">Kode Buku</label>
              <input type="text" class="butt" name="kode" id="kode">
            </li>
             <li>
              <label for="jumlah" class="lab">Jumlah</label>
              <input class="butt" type="text" name="jumlah" id="jumlah">
            </li> 
            <button type="submit" name="submit" class="pesan">Order</button>
        </form>

</div>			

</body>
</html>
