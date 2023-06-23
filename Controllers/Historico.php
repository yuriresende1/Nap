<!-- CREATE TABLE `nap` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `course_period` varchar(255) DEFAULT NULL,
  `shift_course` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `service_description` varchar(255) DEFAULT NULL,
  `responsible_service` varchar(255) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `forwarded_by` varchar(255) DEFAULT NULL,
  `motives` text DEFAULT NULL,
  `patient_history` text DEFAULT NULL,
  `family_history` text DEFAULT NULL,
  `responsible_psychological_care` varchar(255) DEFAULT NULL,
  `date_time_psychological_care` datetime DEFAULT NULL
) CHARSET=utf8mb4; 

LEMBRAR DE RODAR ESTE COMANDO: 
ALTER TABLE nap MODIFY COLUMN id INT PRIMARY KEY AUTO_INCREMENT;
ALTER TABLE nap ADD signature longtext;

-->

<?php
    include("../Models/Nap.php");

    $registrosPorPagina = 10;
    $paginaAtual = isset($_GET['page']) ? $_GET['page'] : 1;

    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    $totalRegistrosSql = "SELECT COUNT(*) AS total FROM nap WHERE cpf LIKE '%$searchQuery%' OR patient_name LIKE '%$searchQuery%' OR course LIKE '%$searchQuery%' OR shift_course LIKE '%$searchQuery%'";
    $totalRegistrosStmt = $conn->query($totalRegistrosSql);
    $totalRegistros = $totalRegistrosStmt->fetch(PDO::FETCH_ASSOC)['total'];

    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

    $offset = ($paginaAtual - 1) * $registrosPorPagina;

    $sql = "SELECT * FROM nap WHERE cpf LIKE '%$searchQuery%' OR patient_name LIKE '%$searchQuery%' OR course LIKE '%$searchQuery%' OR shift_course LIKE '%$searchQuery%' LIMIT $offset, $registrosPorPagina";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $qtd = count($result);

    if ($qtd > 0) {
        echo "
        <form method='GET' action='" . $_SERVER['PHP_SELF'] . "' class='search mb-3'>
            <div class='input-group'>
                <input type='text' class='form-control' name='search' value='" . htmlspecialchars($searchQuery) . "' placeholder='Buscar por CPF, nome, curso ou turno'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-search'></i></button>
            </div>
        </form>
        <table class='table table-hover table-striped table-bordered text-center'>
            <thead class='table-default'>
                <tr>
                    <th>Ação</th>
                    <th>Nome do Paciente</th>
                    <th>Curso</th>
                    <th>Turno</th>
                    <th>Data e Hora</th>
                    <th>Baixar/Deletar</th>
                </tr>
            </thead>
            <tbody>";

        foreach ($result as $row) {
            echo "
            <tr>
                <td>
                    <button class='btn btn-outline-dark' onclick=\"if(confirm('Quer editar essa ficha?')){window.location='../Views/page_edit.php?id=".$row->id."&acao=editar';}\" id='actions'>
                        Editar 
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                    </button>
                </td>
                <td>".$row->patient_name."</td>
                <td>".$row->course."</td>
                <td>".$row->shift_course."</td>
                <td>".$row->date_time_psychological_care."</td>
                <td class='down-delete'>
                    <button class='btn btn-outline-primary' onclick=\"if(confirm('Deseja baixar esta ficha?')){window.location='../Views/page_pdf.php?id=".$row->id."&acao=baixar';}\" id='actions'>
                        Baixar 
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
                        <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                        <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
                        </svg>
                    </button>

                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){window.location='../Controllers/Fichas.php?id=".$row->id."&acao=excluir';}\" class='btn btn-outline-danger' id='actions'>
                        Deletar 
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                    </button>
                </td>
            </tr>";
        }

        echo "
            </tbody>
        </table>";

        if ($totalPaginas > 1) {
            echo "
            <nav aria-label='Navegação de página'>
                <ul class='pagination justify-content-center'>
                    <li class='page-item " . ($paginaAtual == 1 ? 'disabled' : '') . "'>
                        <a class='page-link' href='?page=" . ($paginaAtual - 1) . "' tabindex='-1' aria-disabled='true'>Anterior</a>
                    </li>";

            for ($i = 1; $i <= $totalPaginas; $i++) {
                echo "<li class='page-item " . ($paginaAtual == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
            }

            echo "
                    <li class='page-item " . ($paginaAtual == $totalPaginas ? 'disabled' : '') . "'>
                        <a class='page-link' href='?page=" . ($paginaAtual + 1) . "'>Próxima</a>
                    </li>
                </ul>
            </nav>";
        }
    } else {
        echo "
        <form method='GET' action='" . $_SERVER['PHP_SELF'] . "' class='search mb-3'>
            <div class='input-group'>
                <input type='text' class='form-control' name='search' value='" . htmlspecialchars($searchQuery) . "' placeholder='Buscar por CPF, nome, curso ou turno'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-search'></i></button>
            </div>
        </form>
        <div class='alert alert-info' role='alert'>
            Nenhum registro encontrado.
        </div>";
    }
?>