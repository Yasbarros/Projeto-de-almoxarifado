<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['cargo'] != "Vendedor"){
        header("Location: ./index.php");
    }
?>