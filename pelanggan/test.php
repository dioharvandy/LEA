<?php require '../functions.php';

      $pesanan = pesanan("SELECT pesanan.nopesanan, pelanggan.nama, pelanggan.alamat, pelanggan.nohp, buku.kode, buku.judul, buku.harga, pelanggan.jumlah_pesanan, pesanan.tanggal FROM pesanan JOIN buku ON buku.kode = pesanan.kode JOIN pelanggan ON pelanggan.kode_pelanggan = pesanan.kode_pelanggan"); 	

      var_dump($pesanan);
      echo $pesanan["nopesanan"];
 ?>