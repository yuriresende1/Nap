<?php
    include('../Models/Nap.php');
    session_start();
    
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $patient_name = $_POST['patient_name'];
            $cpf = $_POST['cpf'];
            $course = $_POST['course'];
            $course_period = $_POST['course_period'];
            $shift_course = $_POST['shift_course'];
            $profession = $_POST['profession'];
            $birth_date = $_POST['birth_date'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $service_description = $_POST['service_description'];
            $responsible_service = $_POST['responsible_service'];
            $service_date = $_POST['service_date'];
            $forwarded_by = $_POST['forwarded_by'];
            $motives = $_POST['motives'];
            $patient_history = $_POST['patient_history'];
            $family_history = $_POST['family_history'];
            $responsible_psychological_care = $_POST['responsible_psychological_care'];
            $date_time_psychological_care = $_POST['date_time_psychological_care'];
            $canvasImage = $_POST['canvas_image'];

        
            $sql = "INSERT INTO nap (patient_name, cpf, course, course_period, shift_course, profession, birth_date, age, email, telephone, service_description, responsible_service, service_date, forwarded_by, motives, patient_history, family_history, responsible_psychological_care, date_time_psychological_care, signature) VALUES ('{$patient_name}', '{$cpf}', '{$course}', '{$course_period}', '{$shift_course}', '{$profession}', '{$birth_date}', '{$age}', '{$email}', '{$telephone}', '{$service_description}', '{$responsible_service}', '{$service_date}', '{$forwarded_by}', '{$motives}', '{$patient_history}', '{$family_history}', '{$responsible_psychological_care}', '{$date_time_psychological_care}', '{$canvasImage}')";

            $stmt = $conn->query($sql);

            if ($stmt == true) {
                echo "<script>alert('Ficha cadastrada com sucesso')</script>";
                echo "<script>window.location='../Views/page_history.php?search2='</script>";

                $user = $_SESSION['username'];
                $currentDate = date('Y-m-d');
                $nextIdStmt = $conn->query("SELECT LAST_INSERT_ID()");
                $nextId = $nextIdStmt->fetchColumn();

                $sqlLog = "INSERT INTO log (admin, acao, id_ficha, data_alteracao) VALUES ('{$user}', 'Criou uma ficha', '{$nextId}', '{$currentDate}')";

                $stmtLog = $conn->query($sqlLog);
            } else {
                echo "<script>alert('Falha ao fazer cadastro')</script>";
                echo "<script>window.location='../Views/page_history.php?search2='</script>";
            }

            break;
            
        case 'editar':
            $patient_name = $_POST['patient_name'];
            $cpf = $_POST['cpf'];
            $course = $_POST['course'];
            $course_period = $_POST['course_period'];
            $shift_course = $_POST['shift_course'];
            $profession = $_POST['profession'];
            $birth_date = $_POST['birth_date'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $service_description = $_POST['service_description'];
            $responsible_service = $_POST['responsible_service'];
            $service_date = $_POST['service_date'];
            $forwarded_by = $_POST['forwarded_by'];
            $motives = $_POST['motives'];
            $patient_history = $_POST['patient_history'];
            $family_history = $_POST['family_history'];
            $responsible_psychological_care = $_POST['responsible_psychological_care'];
            $date_time_psychological_care = $_POST['date_time_psychological_care'];
            $canvasImage = $_POST['canvas_image'];

            $sql = "UPDATE nap SET patient_name='{$patient_name}', cpf='{$cpf}', course='{$course}', course_period='{$course_period}', shift_course='{$shift_course}', profession='{$profession}', birth_date='{$birth_date}', age='{$age}', email='{$email}', telephone='{$telephone}', service_description='{$service_description}', responsible_service='{$responsible_service}', service_date='{$service_date}', forwarded_by='{$forwarded_by}', motives='{$motives}', patient_history='{$patient_history}', family_history='{$family_history}', responsible_psychological_care='{$responsible_psychological_care}', date_time_psychological_care='{$date_time_psychological_care}', signature='{$canvasImage}' WHERE id=".$_REQUEST["id"];

            $stmt = $conn->query($sql);

            if ($stmt == true) {
                echo "<script>alert('Ficha editada com sucesso')</script>";
                echo "<script>window.location='../Views/page_history.php?search2='</script>";

                $user = $_SESSION['username'];
                $currentDate = date('Y-m-d');
                $id_deleted = $_REQUEST["id"];

                $sqlLog = "INSERT INTO log (admin, acao, id_ficha, data_alteracao) VALUES ('{$user}', 'Editou uma ficha', '{$id_deleted}', '{$currentDate}')";

                $stmtLog = $conn->query($sqlLog);
            } else {
                echo "<script>alert('Falha ao editar ficha')</script>";
                echo "<script>window.location='../Views/page_history.php?search2='</script>";
            }

            break;

        case 'excluir':
            $sql = "DELETE FROM nap WHERE id=".$_REQUEST["id"];
            $stmt = $conn->query($sql);

            if ($stmt == true) {
                echo "<script>alert('Ficha exluída com sucesso')</script>";
                echo "<script>window.location='../Views/page_history.php?search2='</script>";

                $user = $_SESSION['username'];
                $currentDate = date('Y-m-d');
                $id_deleted = $_REQUEST["id"];

                $sqlLog = "INSERT INTO log (admin, acao, id_ficha, data_alteracao) VALUES ('{$user}', 'Deletou uma ficha', '{$id_deleted}', '{$currentDate}')";

                $stmtLog = $conn->query($sqlLog);
            } else {
                echo "<script>alert('Erro ao excluir ficha')</script>";
                echo "<script>window.location='../Views/page_history.php?search2='</script>";
            }
            break;
    }
?>
