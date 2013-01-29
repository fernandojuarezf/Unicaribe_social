<?php

?>
<html>
<head>
<title>Inicio de sesion</title>
<link href="login_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form action="select.php" method="post" >
<fieldset id="form">
<legend>Inicio de sesion</legend>
<ol>

<li><label>Usuario:</label> <input type="text" name="username" size="25"> </li>
<li><label>Contraseña: </label> <input type="password" name="userpass" size="25"> </li>
 
 </ul>
 <p align="center">   <input type="submit" name="Submit" value="Login" > </p>

 </fieldset>
</form>
</body>
</html>