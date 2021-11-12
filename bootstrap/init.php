<?php 

include "constants.php";
include BASE_PATH."bootstrap/config.php";
include BASE_PATH."libs/helper.php";


// connect to the database
try {
    $db = new PDO("{$dbInfo->driver}:host={$dbInfo->host};dbname={$dbInfo->dbname};charset=utf8mb4",$dbInfo->user,$dbInfo->pass);
} catch (PDOException $err) {
    diePage("error {$err->getCode()}: {$err->getMessage()} in line {$err->getLine()}");
}
// connect to the database






include BASE_PATH."libs/lib-auth.php";
include BASE_PATH."libs/lib-tasks.php";