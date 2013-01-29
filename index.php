


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
<!--

#demo-container{ cursor:pointer;}

ul#simple-menu{list-style-type:none;}
ul#simple-menu li{display:block;float:left;margin:0 0 0 4px;height:27px;}
ul#simple-menu li.left{margin:0;}
ul#simple-menu li a{display:block;float:left;line-height:27px;text-decoration:none;padding:0 17px 0 18px;height:27px;}
ul#simple-menu li a.right{padding-right:19px;}


-->
</style>
<script type="text/javascript" language="JavaScript" src="javascript/ver_pagina.js"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


<link href="css/bootstrap.min.css" rel="stylesheet"> 
 <link href="css/m-styles.min.css" rel="stylesheet"> 

 <link href="css/m-buttons.min.css" rel="stylesheet"> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MENU_PRINCIPAL</title>

<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	background-image: url(imagenes/lgren011.jpg);
	background-repeat: repeat;
}
#apDiv5 {
	position:absolute;
	left:166px;
	top:17px;
	width:909px;
	height:61px;
	z-index:6;
}
#apDiv4 {
	position:absolute;
	left:6px;
	top:82px;
	width:200px;
	height:46px;
	z-index:4;
	font-size:24px;
	font-style:italic;
}
.Estilo2 {
	font-size: 12px;
	font-family: "Segoe UI"; font-style:italic;
}
.Estilo4 {font-size: 12px; font-family: "Segoe UI"; font-style: italic; font-weight: bold; }
-->
</style></head>

<body>

<div id="apDiv4"><span class="Estilo4"> Bienvenido(a)</span><strong><BR /> 
    <span class="Estilo2">
    
    </span></strong><span class="Estilo2">    </span> </div>
<div id="apDiv5" align="center"> 
  <div id="demo-container" >
  <!--<div align="left"><img src="imagenes/Banner_UT_Cancun.png" width="894" height="141"/></div>-->
  <ul id="simple-menu">
<li><a class="m-btn blue-stripe"  href="index.php">Inicio</a></li>
    <li ><a  class="m-btn blue-stripe" onClick="Verpagina('Asesor/asesorprincipal.php');">Asesor</a></li>
   <li><a class="m-btn blue-stripe"  onClick="Verpagina('Monitor/mview_comunidad.php');" >Monitor</a></li>
    <li><a class="m-btn blue-stripe"  onclick= "Verpagina('Comunidad/mview_comunidad.php')" >Comunidad</a></li>
    <li><a class="m-btn blue-stripe"  onclick= "Verpagina('Salon/mview_comunidad.php')" >Salon</a></li>
    <li><a class="m-btn blue-stripe"  onclick= "Verpagina('Taller/mview_comunidad.php')">Taller</a></li>   
    <li><a class="m-btn blue-stripe"  href="salir.php">Salir</a></li>
</ul>
</div>
</div>
<input type="hidden" name="rematricula" value="" />
  <form name="datos" method="post">

</form>

 <iframe src="conexion/plantilla-Iframe.php" id="localscene" name="localscene" frameborder="0" framespacing="0" scrolling="auto" 
 border="0" style="position:relative; left:188px; padding-top: 45px; width:80%; height:500px; z-index:5" allowtransparency="true">
</iframe>

    <script src="js/latestjquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/m-radio.min.js"></script>
</body>

</html>
