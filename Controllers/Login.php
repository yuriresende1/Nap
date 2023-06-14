<?php

    // LEMBRAR DE RODAR ESSE COMANDO NO SQL:
    // ALTER TABLE login ADD COLUMN type VARCHAR(255);
    // DEPOIS ALTERAR PARA QUE NÃO SEJA NULO

	include('../Models/Nap.php');

    switch ($_REQUEST["acao"]) {
        case 'login':
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(isset($_POST['username']) || isset($_POST['password'])) {
                if(strlen($_POST['username']) == 0) {
                    echo "<script>alert('Informe o nome de usuário')</script>";
                    echo "<script>window.location='../Views/index.php'</script>";
                } else if (strlen($_POST['password']) == 0) {
                    echo "<script>alert('Informe sua senha')</script>";
                    echo "<script>window.location='../Views/index.php'</script>";
                } else {
                    try {
                        $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username AND password = :password");
                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':password', $password);
                        $stmt->execute();

                        $usuario = $stmt->fetch();

                        if ($usuario) {
                            if (!isset($_SESSION)) {
                                session_start();
                            }

                            $_SESSION['id'] = $usuario['id'];
                            $_SESSION['username'] = $usuario['username'];
                            $_SESSION['type'] = $usuario['type'];

                            echo "<script>window.location='../Views/page_secundary.php'</script>";
                        } else {
                            echo "<script>alert('Falha ao fazer login! Usuário ou senha incorretos')</script>";
                            echo "<script>window.location='../Views/index.php'</script>";
                        }
                    } catch(PDOException $error) {
                        echo "Erro ao executar consulta: " . $error->getMessage();
                    }
                }
            }

            break;

        case 'register':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirmation = $_POST['passwordConfirmation'];
            $type = $_POST['opcao'];

            if($password !== $passwordConfirmation) {
                echo "<script>alert('Senhas diferentes')</script>";
                echo "<script>window.location='../Views/page_register.php'</script>";
            } else {
                $sql = "INSERT INTO login (username, password, type) VALUES ('{$username}', '{$password}', '{$type}')";

                $stmt = $conn->query($sql);

                if ($stmt == true) {
                    echo "<script>alert('Usuário cadastrado')</script>";
                    echo "<script>window.location='../Views/page_users.php?search2='</script>";
                } else {
                    echo "<script>alert('Falha ao fazer cadastro')</script>";
                    echo "<script>window.location='../Views/page_users.php?search2='</script>";
                }
            }

            // Verificar se ja existe o usuário cadastrado
            // Verificar se todas as opões estão preenchidas
            // Verificar se a senha e a confirmação da senha são iguais
            break;
        
        case 'edit':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirmation = $_POST['passwordConfirmation'];
            $type = $_POST['opcao'];

            if($password !== $passwordConfirmation) {
                echo "<script>alert('Senhas diferentes')</script>";
                echo "<script>window.location='../Views/page_editUser.php'</script>";
            } else {
                $sql = "UPDATE login  SET username='{$username}', password='{$password}', type='{$type}' WHERE id=".$_REQUEST['id']."";

                $stmt = $conn->query($sql);

                if ($stmt == true) {
                    echo "<script>alert('Usuário editado com sucesso')</script>";
                    echo "<script>window.location='../Views/page_users.php?search2='</script>";
                } else {
                    echo "<script>alert('Falha ao editar usuário')</script>";
                    echo "<script>window.location='../Views/page_users.php?search2='</script>";
                }
            }
        
            break;
        
        case 'delete':
            $sql = "DELETE FROM login WHERE id=".$_REQUEST["id"];
            $stmt = $conn->query($sql);

            if ($stmt == true) {
                echo "<script>alert('Usuário excluído')</script>";
                echo "<script>window.location='../Views/page_users.php?search2='</script>";
            } else {
                echo "<script>alert('Erro ao deletar usuário')</script>";
                echo "<script>window.location='../Views/page_users.php?search2='</script>";
            }
    }
?>
