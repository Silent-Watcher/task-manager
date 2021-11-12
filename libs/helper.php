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