<?php 
include "bootstrap/init.php"; 


if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["submit"])){
    $action = $_GET["action"];
    $params = $_POST;
    switch ($action) {
        case 'register':
            $result = register($params);
            if(!$result){
                echo message("registeration faild try again :( ");
            }else{
                header("location:".baseUrl("auth.php"));
                echo message("you successfuly registered please login ","success") ;
            }
            break;
        case 'login':
            $result = login($params["email"],$params["password"]);
            if(!$result){
                echo message("email or password is incorrext");
            }else{
                echo message('successfully logged in <br> <a href="'.baseUrl().'">manage your tasks</a> ',"success");
                
            }
            break;
        
        default:
            diePage("invalid action");
            break;
    }

}





include "views/tpl-auth.php"; 




