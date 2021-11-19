<?php defined("BASE_PATH") or die("permission denied");

function diePage(string $str = null ){
    echo "<p style='text-align: center; background: #ffcece; padding: 20px; width: 80%; margin: 200px auto; border-radius: 5px; color: #732d2d;'>{$str}</p>";
    die();
}

function dd( $data = null ){
    echo"<pre style='position: absolute; z-index: 10000; background: #404040; color: #f5f5f5; padding: 30px ; border-radius: 5px ; width: 60%; margin: 200px ;'>";
    print_r($data);
    echo"</pre>";
}

function baseUrl(string $uri = null):string{
    return "http://php.exp/task%20manager/".$uri;
}

function passwordChecker(string $pass = null){
    if(strlen($pass) < 8 ){
        return false;
    }
    if(!preg_match("/[0-9]+/",$pass)){
        return false;
    }
    if(!preg_match("/[a-zA-Z]+/",$pass)){
        return false;
    }
    if(!preg_match("/[@#$%^&*]+/",$pass)){
        return false;
    }
    return true;
}


function message($data,$stat = "error"){
    switch ($stat) {
        case 'error':
            $temp = (object)array("bg"=>"#ffb7b7","color"=>"#531818");            
            break;
        case 'success':
            $temp = (object)array("bg"=>"#adfc9c","color"=>"#285318");
            break;
        default:
            die("invalid stat");
            break;
    }
    $msg ="<p class='message' style='position: absolute; top: 50%; left: 50%; background: {$temp->bg}; color: {$temp->color}; padding: 20px; z-index: 1000; border-radius: 5px;'>{$data}</p>";
    return $msg;
}
