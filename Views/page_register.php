<?php 
	include('../Models/Nap.php');

	header("HTTP/1.0 404 Not Found");

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['id']) || ($_SESSION['type'] !== 'adminNap')) {
        die("

        <script>window.location='../Views/pagerro.html'</script>
        
        ");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nap - Cadastrar</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/page_register.css">
	</head>
	<body>
		<div class="container">
			<form action="../Controllers/Login.php" method="POST">
				<input type="hidden" name="acao" value="register">
				<div>
					<img src="../assets/images/naplogo.jpg" width="200"> 
				</div>
				<br>
				<h2>Crie um perfil de usuário</h2>
				<div class="form-group">
					<label for="username">Usuário</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Nome de usuário">
				</div>
				<div class="form-group">
					<label>Tipo de Usuário:</label>
					<div class="form-check">
						<input type="radio" id="adminNap" name="opcao" value="adminNap" class="form-check-input">
						<label for="adminNap" class="form-check-label">Admin nap</label>
					</div>
					<div class="form-check">
						<input type="radio" id="admin" name="opcao" value="admin" class="form-check-input">
						<label for="admin" class="form-check-label">Admin</label>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="passwordConfirmation">Confirme a senha:</label>
					<input type="password" id="passwordConfirmation" name="passwordConfirmation" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</body>
</html>