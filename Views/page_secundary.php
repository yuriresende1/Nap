<?php 
  include("../Controllers/Protect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NAP - Home</title>
	<link rel="stylesheet" href="../assets/css/page_secundary.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!-- botão search -->
	<header>
	<div class="search-container">
		<div class="userAndLogout">
			<p class="userSession">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
				<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
				<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
				</svg> 
				<?php echo $_SESSION['username'];  ?>
			</p>
			<label for="options" <?php echo ($_SESSION['type'] === 'adminNap') ? '' : 'hidden'; ?>>Mais Opções:</label>
			<select onchange="navigate()" id="options" name="options" <?php echo ($_SESSION['type'] === 'adminNap') ? '' : 'hidden'; ?>>
				<option value="" disabled selected hidden>Selecione uma opção</option>
				<option value="users">Controle de usuários</option>
				<option value="log">Log</option>
			</select>
			<a href="../Controllers/Logout.php" class="logoutSession">Sair <i class="fa fa-sign-out"></a></i>
		</div>
	</div>
	<h1> Núcleo de Apoio Psicopedagógico</h1>
		<nav>
			<ul>
				<li><a id="nav-li" href="#">Início</a></li>
				<li><a id="nav-li" href="../Views/page_form.php">Cadastrar fichas</a></li>
				<li><a id="nav-li" href="../Views/page_history.php?search2=">Histórico de fichas</a></li>
			</ul>
		</nav>
	</header>
		<img src="../assets/images/naplogo.jpg" width="500";>
		<main>
		<section class="section1">
			<h2> Sobre </h2>
			<p>O Núcleo de Apoio Psicopedagógico (NAP) é um serviço voltado para o atendimento de acadêmicos, funcionários, professores e gestores dos cursos de graduação e pós-graduação da Univiçosa, no que diz respeito ao seu desenvolvimento social, pessoal, emocional e, sobretudo, nos processos de ensino-aprendizagem envolvidos na construção do saber.
			<br>
			<br>
			São finalidades do NAP a gestão do programa de monitorias, intervenções clínico-pedagógicas, aplicação de programas de desenvolvimento das habilidades cognitivas, o desenvolvimento de tecnologias aplicadas à educação, orientação de estudos e atendimento individualizado (incluindo aplicação de avaliações individualizadas através do método da avaliação assistida), uma vez realizada a solicitação prévia por parte da gestão do curso.
			<br>
			<br>
			O aluno pode procurar o NAP espontaneamente, assim como os gestores, professores e funcionários. Contudo, solicita-se, uma vez iniciados os atendimentos, que o acadêmico apresente um encaminhamento realizado pela gestão, demonstrando que o gestor tenha ciência de que seu aluno está sendo atendido no NAP e possa estar informado das adaptações que o aluno poderá solicitar, como aplicação de provas individualizadas, dentre outros atendimentos especiais
			<br>
			<br>
			Os atendimentos ocorrem em sessões semanais, eventualmente duas vezes por semana, em período condizente com a necessidade do acadêmico e com o tipo de atividade aplicada.
			<br>
			<br>
			O atendimento é realizado por estagiários do curso de Psicologia e a psicóloga do setor sob supervisão do Coordenador do Núcleo. 
			</p>
		</section>
	</main>
		<footer>
		<h4>Atendimento</h4>
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  		<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
		</svg> (31) 3899-8000
		<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  		<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
		</svg> nap@univicosa.com.br
		<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  		<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
		</svg>Núcleo de Apoio Psicopedagógico, sala 01 e 02 do NAP/Univiçosa
		<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
  		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
		</svg> Segunda a Quinta-feira de 07:00 ás 22:00 e Sexta-feira de 07:00 ás 18:00.
		<br>
		<br>
		<hr>
		<br>
		<p>&copy; 2023 GRUPO GLYMTECH Todos os direitos reservados.</p>
		</footer>
		<script src="../assets/js/navigate.js"></script>
	</body>
</html>
