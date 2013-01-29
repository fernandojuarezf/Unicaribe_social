
<html >
<head>
<title>Vista comunidad</title>
</head>
<body>


<?php 

require_once('funciones.php');
$comboedad = getComboEdad();
$combotaller = getComboTaller();

?>

<table width=”500″ border=”0″ class=”Msgbox_Popup”>
<tr>
<td colspan=”2″><div align=”center” class=”title”>Busqueda por filtros Comunidad </div></td>
</tr>
<tr>
<td width=”101″><div align=”right” >Buscar por sexo:</div></td>
<td width=”389″><select name="com_sexo">
<option value="1">Hombre</option>
<option value="0">Mujer</option>
</select>
</td>
</tr>
<tr>
<td><div align=”right” >Buscar por zona:</div></td>
<td><input type="text" name="com_zona" size="30">
</td>
</tr>
<tr>
<td>

<div align=”right” >
Buscar por taller:
</div>
</td>
<td>


<select name="com_taller" >
<option value="">Elige un taller</option>
<?php foreach($combotaller as $combo_taller):?>
<option value="<?php echo $combo_taller['id_curso'];?>"> <?php echo $combo_taller['curso'];?> </option>
<?php endforeach;?>
</select>

</td>
</tr>
<tr>
<td>
<div align="left">Buscar por edad</div>
</td>
<td>
<select name="com_edad" >
<option value="">Elige edad</option>
<?php foreach($comboedad as $combo_edad):?>
<option value="<?php echo $combo_edad['edad'];?>"> <?php echo $combo_edad['edad'];?> </option>
<?php endforeach;?>
</select>
</td>
</tr>
</table>

<input type="submit" name="Submit" value="Buscar"  > 


</body>
</html>