<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>

<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>

    <?php
    if($_SESSION['cargo']=='Administrador'){
        include "c-vendas-adm.php";
    }elseif($_SESSION['cargo']=='Vendedor'){
        include "c-vendas-vend.php";
    }

    ?>

   
</body>
</html>