<?php
	$conn = mysqli_connect("localhost","root","","dbtokobuku");
//login
	function login(){
		
	global $conn;
		
		//ambil data dari database

	$nama = $_POST["username"];
	$nopegawai = $_POST["no_pegawai"];
	$password = $_POST["password"];
	$result = mysqli_query($conn,"SELECT  * FROM pegawai WHERE nama = '$nama'");

	//cek apakah data nama ada  di database
	if(mysqli_num_rows($result)===1){
		
		$row = mysqli_fetch_assoc($result);
			//cek no pegawai
			if($nopegawai==$row["no_pegawai"]){
			//cek password	
				if( password_verify($password, $row["password"])){

					$_SESSION["login"] = true;

    				header("Location: ../pegawai") ;	}
				else{
					echo"<script>
					alert('login failed!');
					     </script>";	}		}
			else{
				echo"<script>
				alert('login failed!');
					 </script>";	} 	}
 	else{
  	 	echo"<script>
  		alert('login failed!');
  			 </script>"; 	}

		return mysqli_affected_rows($conn);
	}
//ganti password
	function ganti(){
		global $conn;

	$nama1 = strtolower(stripcslashes($_POST["username"]));
	$nama =  $_POST["username"];	
	$nopegawai = $_POST["no_pegawai"];
	$password = $_POST["password"];
	$passwordbaru = mysqli_real_escape_string($conn,$_POST["passwordbaru"]);
	$passwordbaru = password_hash($password, PASSWORD_DEFAULT);
	$query = "UPDATE pegawai SET password ='$passwordbaru',nama = '$nama1' WHERE no_pegawai ='$nopegawai'";
	$result = mysqli_query($conn,"SELECT  * FROM pegawai WHERE nama = '$nama'");

			//cek data nama
			if(mysqli_num_rows($result)===1){

				$row = mysqli_fetch_assoc($result);
			//cek no
				if($nopegawai==$row["no_pegawai"]){
			//cek password
					if($password==$row["password"]){
				//cek inputan password baru tidak kosong		
						if($passwordbaru!=NULL){
								
							

							mysqli_query($conn,$query);
							echo "<script>
							alert('Password Berhasil Diubah!');
							document.location.href = 'index.php';
								  </script>";	}
					
						else{
							echo "<script>
							alert('Masukkan Password Baru');
							document.location.href = 'ganti.php';
								  </script>";	}	}
					else {
						echo "<script>
						alert('Data Yang Dimasukkan Salah!');
						document.location.href = 'ganti.php';
						      </script>";	}	}
				else {
					echo "<script>
					alert('Data Yang Dimasukkan Salah!');
					document.location.href = 'ganti.php';
						  </script>";	}	}
			else {	
				echo "<script>
				alert('Data Yang Dimasukkan Salah!');
				document.location.href = 'ganti.php';
			          </script>";	}

			return mysqli_affected_rows($conn);		}
	?>