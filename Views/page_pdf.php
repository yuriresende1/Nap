<?php
    include("../Models/Nap.php");
    $sql = "SELECT * FROM nap WHERE id=".$_REQUEST["id"];
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    require_once '../vendor/autoload.php';

    foreach($result as $row) {
        $patient_name = $row->patient_name;
        $cpf = $row->cpf;
        $course = $row->course;
        $course_period = $row->course_period;
        $shift_course = $row->shift_course;
        $profession = $row->profession;
        $birth_date = $row->birth_date;
        $age = $row->age;
        $email = $row->email;
        $telephone = $row->telephone;
        $service_description = $row->service_description; 
        $responsible_service = $row->responsible_service;
        $service_date = $row->service_date;
        $forwarded_by = $row->forwarded_by;
        $motives = $row->motives;
        $patient_history = $row->patient_history; 
        $family_history = $row->family_history;
        $responsible_psychological_care = $row->responsible_psychological_care; 
        $date_time_psychological_care = $row->date_time_psychological_care;
        $signature = $row->signature;
    }

    $mpdf = new \Mpdf\Mpdf();
    $html = "
    <!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='../assets/css/page_pdf.css'>
            <title>Anamnese/Prontuário - ".$row->patient_name."</title>
        </head>
        <body>
            <header>
                <div class='img-logo'>
                </div>
            </header>
            <h1 style='text-align: center;'>Ficha de prontuário</h1>

            <p><strong>Nome:</strong> $patient_name </p>
            <p><strong>CPF:</strong> $cpf </p>
            <p><strong>Curso:</strong> $course </p>
            <p><strong>Periodo:</strong> $course_period </p>
            <p><strong>Turno:</strong> $shift_course </p>
            <p><strong>Profissão:</strong> $profession </p>
            <p><strong>Data de Nascimento:</strong> $birth_date </p>
            <p><strong>Idade:</strong> $age </p>
            <p><strong>E-mail:</strong> $email </p>
            <p><strong>Telefone:</strong> $telephone </p>
            <p><strong>Descrição do atendimento:</strong> $service_description </p>
            <p><strong>Responsável pelo atendimento:</strong> $responsible_service </p>
            <p><strong>Data do atendimento:</strong> $service_date </p>
        
            <h1 style='text-align: center;'>Ficha de Anamnese</h1>

            <p><strong>Encaminhado por:</strong> $forwarded_by </p>
            <p><strong>Motivos:</strong> $motives </p>
            <p><strong>Histórico do paciente:</strong> $patient_history </p>
            <p><strong>Histórico familiar:</strong> $family_history </p>
            <p><strong>Responsável pelo atendimento psicológico:</strong> $responsible_psychological_care </p>
            <p><strong>Data e Hora:</strong> $date_time_psychological_care </p>

            <img src='$signature' alt='Assinatura'>

        </body>
    </html>
    ";

    $mpdf->WriteHTML($html);
    $mpdf->Output();
?>
