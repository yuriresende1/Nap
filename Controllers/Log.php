<!-- CREATE TABLE log (
    id int AUTO_INCREMENT PRIMARY KEY,
    admin varchar(100),
    acao varchar(100),
    id_ficha int,
    data_alteracao
); -->

<?php
    include("../Controllers/Protect.php");
    include("../Models/Nap.php");

    $registrosPorPagina = 10; 
    $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    $offset = ($paginaAtual - 1) * $registrosPorPagina;
    $sql = "SELECT * FROM log ORDER BY data_alteracao DESC LIMIT $offset, $registrosPorPagina";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $sqlTotal = "SELECT COUNT(*) as total FROM log";
    $stmtTotal = $conn->query($sqlTotal);
    $totalRegistros = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

    if ($totalRegistros > 0) {
        echo "<table class='container table table-hover table-striped table-bordered text-center'>";
        echo "<tr>";
        echo "<th>Usuário</th>";
        echo "<th>Ação feita</th>";
        echo "<th>Id da ficha</th>";
        echo "<th>Data</th>";
        echo "</tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>".$row->admin."</td>";
            echo "<td>".$row->acao."</td>";
            echo "<td>".$row->id_ficha."</td>";
            echo "<td>".date('d/m/Y', strtotime($row->data_alteracao))."</td>";
            echo "</tr>";
        }
        echo "</table>";

        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
        echo "<nav>";
        echo "<ul class='pagination justify-content-center'>";
        if ($totalPaginas > 1) {
            if ($paginaAtual > 1) {
                echo "<li class='page-item'><a class='page-link' href='?pagina=".($paginaAtual - 1)."'>Anterior</a></li>";
            }
            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $paginaAtual) {
                    echo "<li class='page-item active'><a class='page-link' href='#'>".$i."</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?pagina=".$i."'>".$i."</a></li>";
                }
            }
            if ($paginaAtual < $totalPaginas) {
                echo "<li class='page-item'><a class='page-link' href='?pagina=".($paginaAtual + 1)."'>Próxima</a></li>";
            }
        }
        echo "</ul>";
        echo "</nav>";
    } else {
        echo "<p class='alert alert-danger'>Ainda não possui um histórico de log</p>";
    }
?>