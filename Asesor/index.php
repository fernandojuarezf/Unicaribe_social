<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Mantenimiento de Clientes</title>
<script src="../js/jquery-1.3.1.min.js" type="text/javascript"></script>
<script src="../js/jquery.functions.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
</head>

<body>
<center><p><label>TABLA DE ASESORES</label></p></center>
<div id="contenedor">
    <div id="formulario" style="display:none;">
    </div>
    <div id="tabla">
    <?php include "consulta.php" ?>
    </div>
</div>
</body>
</html>
