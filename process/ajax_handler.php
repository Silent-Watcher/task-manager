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
        if(strlen($_POST["folderName"]) >=3){
            echo addFolder($_POST["folderName"]);
        }else{
            echo 0; 
        }
        break;
    case 'addTask':
        if(strlen($_POST["taskName"]) !== 0){
            echo addTask($_POST["taskName"] , $_POST["folderId"]);
        }else{
            echo 0; 
        }
        break;
    default:
        echo "invalid action !";
        break;
}
