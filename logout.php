<?php include("logica-usuario.php");
logout();
header("Location: admin?logout=true");
die();