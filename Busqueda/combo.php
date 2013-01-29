<?

$idcombo = $_POST["id"];
$action =$_POST["combo"];
switch($action){
    case "curso":
	{
        $query ="SELECT curso from cursos";
        foreach($query["data"] as $rs)
            echo '<option value="'.$rs["id_curso"].'">'.htmlentities($rs["curso"]).'</option>';   
    break;
    }
    
    
}
?>


