<?php

if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
	case 1:
		get_nurses();	
		break;
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}


function get_nurses(){
    require_once ("implementation2-nurse.php");
    $obj = new nurse ();
    $obj->select_all_nurses();
    if(!$row = $obj-> fetch()){
        echo'{"result":0,"message:"error getting nurses"}';
    }
    else
    {   
        $row=$obj->fetch();
        echo '{"result":1 ,"nurses":[';
        while($row){
            echo json_encode($row);
            $row = $obj->fetch();
            if($row){
                echo ",";
            }
        }
    echo "]}";
    
    }
}


?>