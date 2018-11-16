<?php include("logica-usuario.php");
logout();
header("Location: trampoadmin?logout=true");
die();