<?php defined("BASE_PATH") or die("permission denied");

function diePage(string $str = null ){
    echo "<p style='text-align: center; background: #ffcece; padding: 20px; width: 80%; margin: 200px auto; border-radius: 5px; color: #732d2d;'>{$str}</p>";
    die();
}