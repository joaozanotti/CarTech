<?php
$urlMecanico = substr($_SERVER['PHP_SELF'], 41);
header("Location: ../cadastro.php?url=".$urlMecanico."");
?>