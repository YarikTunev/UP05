<?
    require_once("../connection.php");
    require_once("../classes/сlassrooms.php");

    $Class = new Classroom($params);
    if(isset($params["id"]))
        $Class->Update();
    else
        $Class->Add();
    
?>