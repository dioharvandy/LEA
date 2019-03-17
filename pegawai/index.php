<?php   require "../functions.php";

        session_start();

        if(!isset($_SESSION["login"])){
          header("Location: ../login/");
          exit;
        }
        
        $buku = barang("SELECT * FROM buku");

        if(isset($_POST["submit"])){

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
<a href="pesanan.php" class="order">|	Orders</a>
<a href="../" title="Home"><img src="../img/1.png" class="order1"></a>
<a href="laporan.php" class="order">| Reports</a>
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
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Jumlah Buku Tersedia</th>
            <th>Gambar</th>
            <th>Harga(Rp)</th>
            <th></th>
        </tr>
       <?php $i=1; ?>
       <?php foreach ($buku as $buks) : ?>
        <tr class="tr">  
              <td><?= $i; ?></td>
              <td><?= $buks["kode"]; ?></td>
              <td><?= $buks["judul"]; ?></td>
              <td><?= $buks["penulis"]; ?></td>
              <td><?= $buks["jumlah"]; ?></td>
              <td><img src="img/<?= $buks["gambar"]; ?>" class="ord"></td>
              <td><?= $buks["harga"]; ?></td>
              <td>
              	<a href="edit.php?kode=<?= $buks["kode"];?>" class="edit">Edit |</a>
              	<a href="hapus.php?kode=<?= $buks["kode"];?>" onclick=" return confirm ('Delete Data?');" class="hapus">Delete</a>
              </td>
		</tr>
      <?php $i++; ?>
    <?php endforeach; ?>
        </table>
        <a href="tambah.php" class="add">Add Product</a>
</div>

</body>
</html>