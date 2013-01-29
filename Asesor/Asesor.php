
<?php

?>
<html>
<head>
<title>Guardar asesor</title>
<link href="asesor_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form action="GuardarAsesor.php" method="post" >
<fieldset id="form">
<h2> Asesor </h2>
<ol>
<li><label> Nombre </label><input type="text" name="nombre" size="30" ></li>
<li> <label> Apellido Paterno: </label> <input type="text" name="apaterno" size="30"> </li>
<li>  <label> Apellido Paterno:</label> <input type="text" name="amaterno" size="30"> </li>
<li>  <label> Telefono particular: </label><input type="text" name="telcasa" size="20"> </li>
<li>   <label> Telefono celular: </label><input type="text" name="telcel" size="20"> </li>
<li>    <label> Correo electronico: </label><input type="text" name="correo" size="30"> </li>
 </ul>
   <input type="submit" name="Submit" value="Guardar" > 
 </fieldset>
</form>
</body>
</html>
