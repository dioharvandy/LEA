<?php require "functions.php";

        session_start();

        if(!isset($_SESSION["login"])){
          header("Location: ../login/");
          exit;
        }
        
      if(isset($_POST["ganti"])){
        ganti();
      } 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
		<div class="container">
		
			<h1>Change Password</h1>

			<div class="home"><a href="../"><img src="../img/1.png"></a></div>
		
		<div class="login" id="change">
				
				<form action="" method="post">
      <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter Username" autofocus autocomplete="off">
      </li>
      <li>
        <label for="no_pegawai">Officer Num</label>
        <input type="text" name="no_pegawai" id="no_pegawai" placeholder="Enter Officer Num" autocomplete="off">
      </li>
      <li>
        <label for="password">Old Password</label>
        <input type="password" name="password" id="password" placeholder="********">
      </li>
      <li>
        <label for="passwordbaru">New Password</label>
        <input type="password" name="passwordbaru" id="passwordbaru" placeholder="*********">
      </li>
      <li>
        <button type="submit" name="ganti">Change</button>
      </li>
      <a href="index.php" class="ganti" id="ganti">Back</a>

</form>			

		</div>	

		</div>




</body>
</html>