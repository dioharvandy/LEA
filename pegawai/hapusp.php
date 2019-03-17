<?php require '../functions.php';

	$nopesanan = $_GET["nopesanan"];

	if (hapusp($nopesanan)>0){
			 	echo"
		<script>
			alert('Done!');
			document.location.href = 'pesanan.php'; 
		</script>

	 		";
		}
		else{

					echo"
		<script>
			alert('Fail!');
			document.location.href = 'pesanan.php';
		</script>

	 		";
		}



 ?>