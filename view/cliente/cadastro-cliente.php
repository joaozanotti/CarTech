<?php
$urlCliente = substr($_SERVER['PHP_SELF'], 40);
header("Location: ../cadastro.php?url=".$urlCliente."");
?>