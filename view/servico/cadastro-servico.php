<?php
$urlServico = substr($_SERVER['PHP_SELF'], 40);
header("Location: ../cadastro.php?url=".$urlServico."");
?>