<?php
    
    define('HOST', 'localhost');
    // define('USER', 'aluno');
    // define('PASS', '123456');
    define('BASE', 'grupo01');
    define('USER', 'root');
    define('PASS', '');
   
try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . BASE, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    die("Falha ao se conectar com o banco de dados: " . $error->getMessage());
}
