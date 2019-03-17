<?php 	$conn = mysqli_connect("localhost","root","","dbtokobuku");
//tampilan barang
function barang($data){
	global $conn;
	$result = mysqli_query($conn,$data);
	//temp untuk array row
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)){
		$rows [] = $row;
	}

	return $rows;
}
//tampilan pesanan
function pesanan($pesanan){
	global $conn;
	$result = mysqli_query($conn,$pesanan);
	//temp untuk array row
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}
//tambah data
function tambah($data){
	global $conn;

	//htmlspecialchars(string) -> berfungsi agar script html tidak terbaca; 

	$kode = htmlspecialchars($_POST["kode"]);
	$judul = htmlspecialchars($_POST["judul"]);
	$penulis = htmlspecialchars($_POST["penulis"]);
	$jumlah = htmlspecialchars($_POST["jumlah"]);
	$harga = htmlspecialchars($_POST["harga"]);
	
	//func upload untuk melakukan proses modifikasi pada upload
	$gambar = upload();
	
	//cek apakah yang dikirim func upload gagal
	if(!$gambar){

		return false;
	}

	$query = "INSERT INTO buku VALUES ('$kode','$judul','$penulis','$jumlah','$gambar','$harga')";

	//cek inputan tidak kosong
		if($judul!=NULL AND $penulis!=NULL AND $gambar!=NULL AND $harga!=NULL){

		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
		
		}
}
//edit data
function edit($data){

	global $conn;
	$kode = $_POST["kode"];
	$judul = htmlspecialchars($_POST["judul"]);
	$penulis = htmlspecialchars($_POST["penulis"]);
	$jumlah = htmlspecialchars($_POST["jumlah"]);
	$gambarlama = htmlspecialchars($_POST["gambarlama"]);
	$harga = htmlspecialchars($_POST["harga"]);

	if($_FILES['gambar']['error']===4){
		$gambar = $gambarlama;
	}
	else{
		$gambar = upload();
	}

 	$query = "UPDATE buku SET 
 					judul ='$judul',
 					penulis ='$penulis',
 					jumlah ='$jumlah',
 					gambar ='$gambar',
 					harga ='$harga'
 					WHERE kode ='$kode'
 					";
//cek apakah inputan tidak kosong
 		if($penulis!=NULL AND $harga!=NULL AND $jumlah!=NULL){

		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
		
		} 
}
function editp($data){
global $conn;
$nopesanan = $_POST["nopesanan"];
$kodepelanggan = $_POST["kode_pelanggan"];
$nama = htmlspecialchars($_POST["nama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$nohp = htmlspecialchars($_POST["nohp"]);
$kode = htmlspecialchars($_POST["kode"]);
$jumlah = htmlspecialchars($_POST["jumlah_pesanan"]);


$query = "UPDATE pesanan SET kode = '$kode' WHERE nopesanan = '$nopesanan'";
$query1 = "UPDATE pelanggan SET nama = '$nama',
			alamat = '$alamat', nohp = '$nohp',
			jumlah_pesanan = '$jumlah' WHERE kode_pelanggan = '$kodepelanggan'";

if($nama!=NULL AND $nohp!=NULL){

	mysqli_query($conn,$query);
	mysqli_query($conn,$query1);

	return mysqli_affected_rows($conn);
}				

} 
//cari
function cari($cari){

	//LIKE -> untuk menampilkan data yang hampir sama dengan inputan, %-> kesamaanya diawal atau diakhir
	$query = "SELECT * FROM buku WHERE
				kode LIKE '%$cari%' 
				OR judul LIKE '%$cari%' 
				OR penulis LIKE '%$cari%'
				";
				//kembalikan fungsi barang
				return barang($query);
}
function carip($cari){

	$query = "SELECT pesanan.nopesanan, 
					pelanggan.nama, 
					pelanggan.alamat, 
					pelanggan.nohp, 
					buku.kode, buku.judul, 
					buku.harga, 
					pelanggan.jumlah_pesanan, 
					pesanan.tanggal, 
					pelanggan.jumlah_pesanan*buku.harga AS total FROM pesanan JOIN buku ON buku.kode = pesanan.kode JOIN pelanggan ON pelanggan.kode_pelanggan = pesanan.kode_pelanggan WHERE 
						pesanan.nopesanan LIKE '%$cari%' 
						OR pelanggan.nama LIKE '%$cari%' 
						OR pelanggan.nohp LIKE '%$cari%'";

	return pesanan($query);
}
function carih($cari){

$query = "SELECT laporan.nolaporan, 
	pelanggan.nama, 
	pelanggan.alamat, 
	pelanggan.nohp, 
	buku.kode, buku.judul, 
	buku.harga, 
	pelanggan.jumlah_pesanan, 
	laporan.tanggal, 
	pelanggan.jumlah_pesanan*buku.harga AS total 
	FROM laporan JOIN buku
	 ON buku.kode = laporan.kode 
	 JOIN pelanggan 
	 ON pelanggan.kode_pelanggan = laporan.kode_pelanggan
						WHERE 
						laporan.nolaporan LIKE '%$cari%' 
						OR pelanggan.nama LIKE '%$cari%' 
						OR pelanggan.nohp LIKE '%$cari%'";

	return pesanan($query);


}
//hapus data
function hapus($kode){
	
	global $conn;

	$query = "DELETE FROM buku WHERE kode='$kode'";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);

}
function hapusp($nopesanan){
	global $conn;
	$pesanan = pesanan("SELECT buku.kode, pelanggan.kode_pelanggan FROM pesanan JOIN buku ON buku.kode = pesanan.kode JOIN pelanggan ON pelanggan.kode_pelanggan = pesanan.kode_pelanggan WHERE pesanan.nopesanan = '$nopesanan' ")[0];


	$kode = $pesanan["kode"];
	$kodepelanggan = $pesanan["kode_pelanggan"]; 
	$tanggal = date("d-M-Y");
	$query = "DELETE FROM pesanan WHERE nopesanan = $nopesanan";
	
	mysqli_query($conn,"INSERT INTO laporan VALUES ('','$kode','$kodepelanggan','$tanggal')");

	mysqli_query($conn,$query);
	
	return mysqli_affected_rows($conn);
}
//upload data
function upload(){

	//mengambil supglob files pada multidim array 'gambar''...'
	$nama = $_FILES['gambar']['name'];
	$ukuran = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmp = $_FILES['gambar']['tmp_name'];

	//(error=4 -> tidak ada yang diupload)

	if($error===4){

		echo "
				<script>
				alert('pilih gambar dulu');
				</script>

		";
		return false;
	}

	//memastikan yang diupload adalah gambar
	$ekstensivalid = ['jpg','jpeg','png'];
	//explode -> memecah string menjadi array pada delimiter('.'); 
	$ekstensi = explode('.', $nama);
	//end ->ambil ekstensi pada array terakhir
	//strtolower -> rubah jadi huruf kecil;
	$ekstensi = strtolower(end($ekstensi));

	//cek ekstensi ada pada array
	if( !in_array($ekstensi, $ekstensivalid)){

				echo "
				<script>
				alert('Upload file gambar');
				</script>

		";
		return false;

	}

	//batasi ukuran upload
	if($ukuran > 2500000){

						echo "
				<script>
				alert('Ukuran terlalu besar');
				</script>

		";
		return false;
	}

	//pindah file pada tmp ke tujuan
	//generate nama baru
	$newnama  = uniqid();
	//.-> merangkai string
	$newnama .= ".";
	$newnama .= $ekstensi;


	//pindahkan file pada temp
	move_uploaded_file($tmp, 'img/'.$newnama);

	//kembalikan nama file untuk masuk ke database

	return $newnama;

}
//pemesanan
function pesan(){     
global $conn;

 $nama = htmlspecialchars($_POST["nama"]);     
 $alamat = htmlspecialchars($_POST["alamat"]);     
 $nohp = htmlspecialchars($_POST["nohp"]);     
 $kode = htmlspecialchars($_POST["kode"]);     
 $jumlah = htmlspecialchars($_POST["jumlah"]);     
 $tanggal = date("d-M-Y");    
 $kodep = (rand()%9999); 
 $query1 = "SELECT * FROM buku WHERE kode = '$kode'";
 $query3 = "UPDATE buku SET jumlah = jumlah-$jumlah WHERE kode = '$kode'";
 $result = mysqli_query($conn,$query1);

//cek kode dan judul pada buku
	if(mysqli_num_rows($result)===1){

		$row = mysqli_fetch_assoc($result);
//cek jumlah
	  if($jumlah<=$row["jumlah"]){

	  $harga = $row["harga"];
	  $judul = $row["judul"];	
//cek apakah inputan tidak kosong
		if($nama!=NULL&&$alamat!=NULL&&$nohp!=NULL&&$jumlah!=NULL){

		mysqli_query($conn,"INSERT INTO pelanggan VALUES ('$kodep','$nama','$alamat','$nohp','$jumlah')");
		mysqli_query($conn,"INSERT INTO pesanan VALUES ('','$kode','$kodep','$tanggal')");
		mysqli_affected_rows($conn);
		mysqli_query($conn,$query3);
				 	echo"
		<script>
			alert('Pesanan Terkirim!');
		</script>

	 		";
}
	else{
		 	echo"
		<script>
			alert('Isi Semua Data!');
		</script>

	 		";
	}}
	else{

				 	echo"
		<script>
			alert('Melampaui Batas !');
		</script>

	 		";

	}
}
	else{
		 	echo"
		<script>
			alert('Masukkan Data dengan Benar!');
		</script>

	 		";
	}
}
?>