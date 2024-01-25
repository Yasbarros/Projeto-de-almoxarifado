<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['cargo'] != "Administrador"){
        header("Location: ./index.php");
    }
?>