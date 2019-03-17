<?php require "functions.php";

      session_start();

      if(isset($_SESSION["login"])){
          header("Location: ../pegawai/");
          exit;
        }

      if(isset($_POST["submit"])){

        login();
      }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>

		<div class="container">	
		

		<h1>Officer Login</h1>

		<div class="home"><a href="../"><img src="../img/1.png"></a></div>

		<div class="login">	
		<form action=""  method="post">
      <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter Name" autofocus autocomplete="off">
      </li>
      <li>
        <label for="no_pegawai">No Pegawai</label>
        <input type="text" name="no_pegawai" id="no_pegawai" placeholder="Enter Officer Num" autocomplete="off">
      </li>
      <li>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="********">
      </li>
      <li>
        <button type="submit" name="submit">Login</button>
      </li>
      <a href="ganti.php" class="ganti"> Change Password </a>
</form>
</div>



		</div>	



</body>
</html>