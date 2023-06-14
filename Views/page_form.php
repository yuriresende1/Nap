<?php 
  include("../Controllers/Protect.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro de fichas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/formulario.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
  </head>
  <body>
    <header class="cabecalho">
      <div class="cabecalho-img">
          <img  
              src="../assets/images/univicosa_horizontal.png" 
              alt="Logo univicosa"
          >
      </div>
      <div class="navegacao">
        <p class="userSession">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg> 
          <?php echo $_SESSION['username'];  ?>
        </p>
        
        <a href="../Views/page_secundary.php">
          <button class="btn btn-outline-primary" id="buttons">Início</button>
        </a>
        <a href="../Views/page_form.php">
          <button class="btn btn-outline-primary" id="buttons">Cadastrar fichas</button>
        </a>
        <a href="../Views/page_history.php?search2=">
          <button class="btn btn-outline-primary" id="buttons">Histórico de fichas</button>
        </a>
        <a href="../Controllers/Logout.php">
          <button class="btn btn-outline-primary" id="buttons">Sair <i class="fa fa-sign-out"></button></i>
        </a>
        
      </div>
    </header>
    <div class="container">
      <h2 class="text-center mb-5">Anamnese</h2>
      <div class="row">
        <div class="col-sm-6">
          <form action="../Controllers/Fichas.php" method="post" id="my-form">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="form-group">
              <label for="patient_name">Paciente:</label>
              <input type="text" placeholder="Nome do paciente" class="form-control" id="patient_name" name="patient_name">
            </div>
            <div class="form-group">
              <label for="cpf">CPF:</label>
            <input type="text" placeholder="000.000.000-00" class="form-control" id="cpf" name="cpf">
          </div>
          <div class="form-group">
            <label for="course">Curso:</label>
            <input type="text" placeholder="Nome do curso" class="form-control" id="course" name="course">
          </div>
          <div class="form-group">
            <label for="course_period">Período:</label>
            <input type="text" placeholder="Exemplo: 3º Período" class="form-control" id="course_period" name="course_period">
          </div>
          <div class="form-group">
            <label for="shift_course">Turno:</label>
            <input type="text" placeholder="Manhã/Tarde/Noite" class="form-control" id="shift_course" name="shift_course">
          </div>
          <div class="form-group">
            <label for="profession">Profissão:</label>
            <input type="text" placeholder="Profissão do paciente" class="form-control" id="profession" name="profession">
          </div>
          <div class="form-group">
            <label for="birth_date">Data de Nascimento:</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date">
          </div>
          <div class="form-group">
            <label for="age">Idade:</label>
            <input type="number" placeholder="00" class="form-control" id="age" name="age">
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" placeholder="email@exemplo.com" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="telephone">Telefone:</label>
            <input type="tel" placeholder="(DDD) 00000-0000" class="form-control" id="telephone" name="telephone">
          </div> 
          <div class="card mt-5 mb-5 text-center">
            <div class="card-header">
              <h4>Assinatura:</h4>
            </div>
            <div class="card-body">
              <canvas id="assinatura" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="service_description">Descrição do Atendimento:</label>
            <textarea class="form-control" id="service_description" name="service_description"></textarea>
          </div>
          <div class="form-group">
            <label for="responsible_service">Responsável pelo atendimento:</label>
            <input type="text" class="form-control" id="responsible_service" name="responsible_service">
          </div>
          <div class="form-group">
            <label for="service_date">Data do atendimento:</label>
            <input type="date" class="form-control" id="service_date" name="service_date">
          </div>
          <div class="mt-5">
            <h2 class="text-center mb-5">Prontuário</h2>
            <div class="mb-3">
              <label for="forwarded_by" class="form-label">Encaminhado por:</label>
              <input type="text" class="form-control" id="forwarded_by" name="forwarded_by">
            </div>
            <div class="mb-3">
              <label for="motives" class="form-label">Motivos:</label>
              <textarea class="form-control" id="motives" name="motives"></textarea>
            </div>
            <div class="mb-3">
              <label for="patient_history" class="form-label">Histórico do paciente:</label>
              <textarea class="form-control" id="patient_history" name="patient_history"></textarea>
            </div>
            <div class="mb-3">
              <label for="family_history" class="form-label">Histórico familiar:</label>
              <textarea class="form-control" id="family_history" name="family_history"></textarea>
            </div>
            <div class="mb-3">
              <label for="responsible_psychological_care" class="form-label">Responsável pelo atendimento psicológico:</label>
                <input type="text" class="form-control" id="responsible_psychological_care" name="responsible_psychological_care">
              </div>
              <div class="mb-3">
                <label for="date_time_psychological_care" class="form-label">Data e Hora:</label>
                <input type="datetime-local" class="form-control" id="date_time_psychological_care" name="date_time_psychological_care">
              </div>
              <button type="submit" class="btn btn-outline-primary" id="buttonSend">Salvar informações</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
      const canvas = document.getElementById('assinatura');
      const signaturePad = new SignaturePad(canvas);

      document.getElementById('botao-assinar').addEventListener('click', function() {
        signaturePad.clear();
        canvas.style.display = 'block';
        this.style.display = 'none';
      });

      canvas.addEventListener('mouseup', function() {
        if (!signaturePad.isEmpty()) {
          document.getElementById('botao-assinar').style.display = 'none';
        }
      });
    </script>
    <script src="../assets/js/index.js"></script>
  </body>
  </html>