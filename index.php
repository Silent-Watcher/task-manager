<?php 
include "bootstrap/init.php"; 

if(isset($_GET["logout"]) and !empty($_GET["logout"])){
    logout();
}
// check if the user is logged in
if(!isLoggedIn()){
    header("location:".baseUrl("auth.php"));
}
// check if the user is logged in

// get logged in user
$user = getLoggedInUser();
// get logged in user

// delete folders
if(isset($_GET["deleteFolderId"]) and is_numeric($_GET["deleteFolderId"])){
    deleteFolder($_GET["deleteFolderId"]);
}
// delete folders

// delete tasks
if(isset($_GET["deleteTaskId"]) and is_numeric($_GET["deleteTaskId"])){
    deleteTask($_GET["deleteTaskId"]);
}
// delete tasks

// update tasks
if(isset($_GET["taskId"]) and is_numeric($_GET["taskId"])){
    updateTask($_GET["taskId"]);
}
// update tasks

// get folders from database
$folders = getFolders();
// get folders from database

// get tasks from database
$tasks = getTasks();

// get tasks from database


include "views/tpl-index.php"; 