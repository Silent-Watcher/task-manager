<?php 
include "bootstrap/init.php"; 


if(isset($_GET["deleteFolderId"]) and is_numeric($_GET["deleteFolderId"])){
    deleteFolder($_GET["deleteFolderId"]);
}

// get folders from database
$folders = getFolders();
// get folders from database


include "views/tpl-index.php"; 