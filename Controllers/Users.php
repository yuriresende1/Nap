<?php
    // include("../Models/Nap.php");

    // $sql = "SELECT * FROM login";
    // $stmt = $conn->query($sql);
    // $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    // $qtd = count($result);

    // if ($qtd > 0) {
    //     echo 
    //     "<form class='search' action='" . $_SERVER['PHP_SELF'] . "' method='GET'>
	// 		<input type='text' placeholder='Usuário, Tipo' name='search2' value='" . (isset($_GET['search2']) ? $_GET['search2'] : '') . "'/>
	// 		<button type='submit'><i class='fa fa-search'></i></button>
	// 	</form>";

    //     if (isset($_GET['search2'])) {
    //         $search2 = $_GET['search2'];
    //         $sql = "SELECT * FROM login WHERE username LIKE '%$search2%' OR type LIKE '%$search2%'";
    //         $stmt = $conn->query($sql);
    //         $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    //         $qtd = count($result);

    //         if ($qtd < 1) {
    //             echo "<p class='alert alert-danger'>Nenhum dado encontrado com essa busca</p>";
    //         } else {
    //             echo "<table class='container table table-hover table-striped table-bordered text-center'>";
    //             echo "<tr>";
    //                 echo "<th>Usuário</th>";
    //                 echo "<th>Tipo de usuário</th>";
    //                 echo "<th>Ações</th>";
    //             echo "</tr>";
    //         foreach ($result as $row) {
    //             echo "<tr>";
    //                 echo "<td>".$row->username."</td>";
    //                 echo "<td>".$row->type."</td>";
    //                 echo "<td id='button-td'>
    //                         <button 
    //                             class='btn btn-outline-dark'
    //                             id='actions'
    //                             onclick=\"if(confirm('Quer editar dados desse usuário?')){window.location='../Views/page_editUser.php?id=".$row->id."&acao=editar';}\">
    //                             Editar
    //                             <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
    //                             <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
    //                             </svg>
    //                         </button>

    //                         <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){window.location='../Controllers/Login.php?id=".$row->id."&acao=delete';}\" class='btn btn-outline-danger' id='actions'>
    //                             Deletar
    //                             <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
    //                             <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
    //                             <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
    //                             </svg>
    //                         </button>
    //                     </td>";
    //             echo "</tr>";
    //         }
    //         echo "</table>";
    //         }
    //     }
    // } else {
    //     echo "<p class='alert alert-danger'>Nenhum usuário cadastrado</p>";
    // } 



    include("../Models/Nap.php");

    $resultadosPorPagina = 6;

    $paginaAtual = isset($_GET['page']) ? $_GET['page'] : 1;

    $offset = ($paginaAtual - 1) * $resultadosPorPagina;

    $sqlTotal = "SELECT COUNT(*) AS total FROM login";
    $stmtTotal = $conn->query($sqlTotal);
    $totalResultados = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

    $totalPaginas = ceil($totalResultados / $resultadosPorPagina);

    $sql = "SELECT * FROM login";

    if (isset($_GET['search2'])) {
        $search2 = $_GET['search2'];
        $sql .= " WHERE username LIKE '%$search2%' OR type LIKE '%$search2%'";
    }

    $sql .= " LIMIT $offset, $resultadosPorPagina";

    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $qtd = count($result);

    if ($qtd > 0) {
        echo "<form class='search' action='" . $_SERVER['PHP_SELF'] . "' method='GET'>
                <input type='text' placeholder='Usuário, Tipo' name='search2' value='" . (isset($_GET['search2']) ? $_GET['search2'] : '') . "'/>
                <button type='submit'><i class='fa fa-search'></i></button>
            </form>";

        if (isset($_GET['search2'])) {
            if ($qtd < 1) {
                echo "<p class='alert alert-danger'>Nenhum dado encontrado com essa busca</p>";
            } else {
                echo "<table class='container table table-hover table-striped table-bordered text-center'>";
                echo "<tr>";
                echo "<th>Usuário</th>";
                echo "<th>Tipo de usuário</th>";
                echo "<th>Ações</th>";
                echo "</tr>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row->username . "</td>";
                    echo "<td>" . $row->type . "</td>";
                    echo "<td id='button-td'>
                                <button 
                                    class='btn btn-outline-dark'
                                    id='actions'
                                    onclick=\"if(confirm('Quer editar dados desse usuário?')){window.location='../Views/page_editUser.php?id=" . $row->id . "&acao=editar';}\">
                                    Editar
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </button>

                                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){window.location='../Controllers/Login.php?id=" . $row->id . "&acao=delete';}\" class='btn btn-outline-danger' id='actions'>
                                    Deletar
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                </button>
                            </td>";
                    echo "</tr>";
                }
                echo "</table>";
      
                echo "<ul class='pagination'>";
                if ($paginaAtual > 1) {
                    echo "<li><a class='page-link' href='" . $_SERVER['PHP_SELF'] . "?search2=" . (isset($_GET['search2']) ? $_GET['search2'] : '') . "&page=" . ($paginaAtual - 1) . "'>&laquo;</a></li>";
                } else {
                    echo "<li class='disabled'><a class='page-link' href='#'>&laquo;</a></li>";
                }

                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo "<li class='" . ($i == $paginaAtual ? "active" : "") . "'><a class='page-link' href='" . $_SERVER['PHP_SELF'] . "?search2=" . (isset($_GET['search2']) ? $_GET['search2'] : '') . "&page=$i'>$i</a></li>";
                }

                if ($paginaAtual < $totalPaginas) {
                    echo "<li><a class='page-link' href='" . $_SERVER['PHP_SELF'] . "?search2=" . (isset($_GET['search2']) ? $_GET['search2'] : '') . "&page=" . ($paginaAtual + 1) . "'>&raquo;</a></li>";
                } else {
                    echo "<li class='disabled'><a class='page-link' href='#'>&raquo;</a></li>";
                }

                echo "</ul>";

            }
        } else {
            echo "<p class='alert alert-danger'>Nenhum dado encontrado com essa busca</p>";
        }
    } else {
        echo "
            <form class='search' action='" . $_SERVER['PHP_SELF'] . "' method='GET'>
                <input type='text' placeholder='Usuário, Tipo' name='search2' value='" . (isset($_GET['search2']) ? $_GET['search2'] : '') . "'/>
                <button type='submit'><i class='fa fa-search'></i></button>
            </form>";
        echo "<p class='alert alert-danger'>Nenhum usuário encontrado</p>";
    }


?>