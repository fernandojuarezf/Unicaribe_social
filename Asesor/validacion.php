<?php

function validar_nombre($nombre)
{
	if (strlen($nombre)<4)
		return false;
	else
		return true;
}

function validar_apaterno($apaterno)
{
 if(strlen($apaterno)<1 )
 	return false;
 else
 	return true;
}

function validar_amaterno($amaterno)
{
 if(strlen($amaterno)<1 )
 	return false;
 else
 	return true;
}

function validar_telcasa($telcasa)
{
	if(strlen($telcasa)<7)
		return false;
	else
		return true;
}

function validar_telcel($telcel)
{
	if(strlen($telcel)<10)
		return false;
	else
		return true;
}
function validar_correo($email)
{
		return ereg("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$", $email);
}
?>