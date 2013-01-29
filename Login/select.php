<?php 

$username = $_POST['username'];
$userpass = $_POST['userpass'];


if(selectFromDB()==$userpass)
{
    
	header("location: Asesor.php");
    }
    else
    {
    echo "false";
}

function selectFromDB()
{
  
global $username;

include "config.php";
$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
or die ("Ocurrio un error en la conexion " . pg_last_error($conn)); 

$query = "SELECT pass from usuarios where fullname='$username'";
$result = pg_query($conn,$query);
$count = pg_num_rows($result);

if($count)
{
    $output = pg_result($result,0);
    return $output;
}
else
{
    return "0";
}

pg_free_result($result);
pg_close($conn);




}




?>