<?php

    header("HTTP/1.0 404 Not Found");

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['id'])) {
        die("

        <script>window.location='../Views/pagerro.html'</script>
        
        ");
    }
?>