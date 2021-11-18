<?php 

include "C:/xampp/htdocs/php.exp/task manager/bootstrap/init.php";

// check if the request is ajax 
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest' )
{
    diePage("the request is not ajax");
}
// check if the request is ajax 



if(!isset($_POST["action"]) || empty($_POST["action"])){
    diePage("invalid action !");
}

switch ($_POST["action"]) {
    case 'addFolder':
        echo addFolder($_POST["folderName"]);
        break;
    
    default:
        echo "invalid action !";
        break;
}
