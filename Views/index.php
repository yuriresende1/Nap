<?php 
	include('../Models/Nap.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nap - Login</title>
		<link rel="stylesheet" href="../assets/css/csslogin.css">
	</head>
	<body>
		<div class="container">
			<form action="../Controllers/Login.php" method="POST">
				<input type="hidden" name="acao" value="login">
				<div>
					<img src="../assets/images/naplogo.jpg" width="200";>
				</div>
				<br>
				<h2>Faça o login para acessar o sistema</h2>
				<label for="username">Usuario:</label>
				<input type="text" id="username" name="username">
				<label for="password">Senha:</label>
				<input type="password" id="password" name="password">
				<button type="submit" style="margin:auto; margin-top: 5px; display:block">Entrar</button>
			</form>
		</div>
	</body>
</html>
