<?php require '../functions.php';


$kode = $_GET["nopesanan"];

$pesanan = pesanan("SELECT pesanan.nopesanan, pelanggan.nama, pelanggan.kode_pelanggan, pelanggan.alamat, pelanggan.nohp, buku.kode, buku.judul, buku.harga, pelanggan.jumlah_pesanan, pesanan.tanggal FROM pesanan JOIN buku ON buku.kode = pesanan.kode JOIN pelanggan ON pelanggan.kode_pelanggan = pesanan.kode_pelanggan WHERE pesanan.nopesanan = '$kode' ")[0];

if(isset($_POST["submit"])){
  if(editp($_POST)>0){
    echo"
          <script>
          alert('Data edited!');
          document.location.href = 'pesanan.php';
        </script> ";
  }
  else {
    echo"
                <script>
                alert('Data Might be Empty or Same!');
                </script>

              ";
  }
}

 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Officer</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="fixed">
<a href="pesanan.php" class="order">Back</a>
</div>

<div class="produk" id="produk" style="overflow-x: auto;">
<form method="post" action="">  
<table border="0" cellspacing="0" cellpadding="10">  

        <tr>  
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Kode Buku</th>
            <th>Jumlah</th>
        </tr>
        <tr >  
                <input type="hidden" name="nopesanan" value="<?= $pesanan["nopesanan"]; ?>">
                <input type="hidden" name="kode_pelanggan" value="<?= $pesanan["kode_pelanggan"]; ?>">

              <td>
                 <input type="text" name="nama" class="button" value="<?= $pesanan["nama"]; ?>" autofocus>
              </td>
              <td>
                 <input type="text" name="alamat" class="button" value="<?= $pesanan["alamat"]; ?>">
              </td>
              <td>
                 <input type="text" name="nohp" class="button" value="<?= $pesanan["nohp"]; ?>">
              </td>
              <td>
                 <input class="button" type="text" name="kode" value="<?= $pesanan["kode"];  ?>">
              </td>
              <td>
                 <input type="text" name="jumlah_pesanan" class="button" value="<?= $pesanan["jumlah_pesanan"]; ?>">
              </td>
              <td class="button">
                 <button type="submit" name="submit" class="button"> Edit </button>
              </td>
    </tr>
        </table>
        </form>
</div>

</body>
</html>