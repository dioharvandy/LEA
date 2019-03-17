<?php 	require '../functions.php';

		$kode = $_GET["kode"];

		if(hapus($kode)>0){
			 	echo"
		<script>
			alert('Data Deleted!');
			document.location.href = 'index.php'; 
		</script>

	 		";
		}
		else{

					echo"
		<script>
			alert('Delete Fail!');
			document.location.href = 'index.php';
		</script>

	 		";
		}


 ?>