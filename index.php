<?php 
include "bootstrap/init.php"; 

// delete folders
if(isset($_GET["deleteFolderId"]) and is_numeric($_GET["deleteFolderId"])){
    deleteFolder($_GET["deleteFolderId"]);
}
// delete folders
// delete tasks
if(isset($_GET["taskId"]) and is_numeric($_GET["taskId"])){
    updateTask($_GET["taskId"]);
}
// delete tasks


// update tasks
if(isset($_GET["deleteFolderId"]) and is_numeric($_GET["deleteFolderId"])){
    deleteFolder($_GET["deleteFolderId"]);
}
// update tasks


// get folders from database
$folders = getFolders();
// get folders from database

// get tasks from database
$tasks = getTasks();
// dd($tasks);
// get tasks from database
include "views/tpl-index.php"; 