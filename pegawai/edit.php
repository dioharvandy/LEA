<?php require "../functions.php";

        session_start();

        if(!isset($_SESSION["login"])){
          header("Location: ../login/");
          exit;
        }

$kode = $_GET["kode"];

$buku = barang("SELECT * FROM buku WHERE kode = $kode")[0];

if(isset($_POST["submit"])){

  if(edit($_POST)>0){
    echo"
          <script>
          alert('Data edited!');
          document.location.href = 'index.php';
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
<a href="index.php" class="order">Back</a>
</div>

<div class="produk" id="produk" style="overflow-x: auto;">
<form method="post" action="" enctype="multipart/form-data">  
<table border="0" cellspacing="0" cellpadding="10">  

        <tr>  
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Jumlah Buku Tersedia</th>
            <th>gambar</th>
            <th>Harga(Rp)</th>
        </tr>
        <tr >  

                <input type="hidden" name="kode" value="<?= $buku["kode"];?>">
                <input type="hidden" name="gambarlama" value="<?= $buku["gambar"]; ?>">

              <td>
                 <input type="text" name="judul" class="button" value="<?= $buku["judul"]; ?>" autofocus>
              </td>
              <td>
                 <input type="text" name="penulis" class="button" value="<?= $buku["penulis"];?>">
              </td>
              <td>
                 <input type="text" name="jumlah" class="button" value="<?= $buku["jumlah"]; ?>">
              </td>
              <td>
                <img src="img/<?= $buku["gambar"];?>" class="er">
                 <input type="file" name="gambar">
              </td>
              <td>
                 <input type="text" name="harga" class="button" value="<?= $buku["harga"]; ?>">
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