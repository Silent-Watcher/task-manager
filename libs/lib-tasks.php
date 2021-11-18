<?php 
defined("BASE_PATH") OR die("permission denied");


// delete folders
function deleteFolder(int $folderId = null){
    global $db;
    $sql = " DELETE FROM folders WHERE id = :id ;";
    $stmt = $db->prepare($sql);
    $stmt->execute(["id"=>$folderId]);
}
// delete folders

// get current user folders from database
function getFolders():array{
    global $db;
    $currentUserId = 1;
    $sql = "SELECT * FROM folders WHERE user_id = {$currentUserId};";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
// get current user folders from database

// make new folder 
function addFolder(string $folderName = null):string{
    global $db;
    global $db;
    $currentUserId = 1;
    $sql = "INSERT INTO folders (user_id,folderName)  VALUES({$currentUserId},:name);";
    $stmt = $db->prepare($sql);
    $stmt->execute(["name"=>$folderName]);
    return intval($db->lastInsertId());
}
// make new folder 


// getTaskInfoWithId
// function getTaskInfo(int $taskId = null):object{
//     global $db;
//     $sql = "SELECT * FROM tasks WHERE id = :id ;";
//     $stmt = $db->prepare($sql);
//     $stmt->execute(["id"=>$taskId]);
//     $result = $stmt->fetch(PDO::FETCH_OBJ);
//     return $result ;
// }
// getTaskInfoWithId


// delete tasks
function deleteTask(int $taskId = null){
    global $db;
    $sql = "DELETE FROM tasks WHERE id = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->execute([$taskId]);
}
// delete tasks


// add tasks
function addTask(string $taskName = null , int $folderId = null ):int{
    global $db;
    $currentUserId = 1;
    $sql = "INSERT INTO tasks (taskName,folder_id,user_id) VALUES (:TaskName,:folderId,:userId)";
    $stmt = $db->prepare($sql);
    $stmt->execute(["TaskName"=> $taskName,"folderId"=> $folderId, "userId"=> $currentUserId]);
    return intval($db->lastInsertId());
}
// add tasks


// update task stat
function updateTask(int $taskId = null){
    global $db;
    $sql ="UPDATE tasks set is_done = 1 - is_done where id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(["id"=>$taskId]);
}
// update task stat


// get current user tasks
function getTasks():array{
    global $db;
    $currentUserId = 1;
    $folderCon = (isset($_GET["folderId"]) and !empty($_GET["folderId"])) ? "and folder_id = {$_GET['folderId']}" : null ;
    $sql = "SELECT * FROM tasks WHERE user_id = ? {$folderCon} ;";
    $stmt = $db->prepare($sql);
    $stmt->execute([$currentUserId]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
// get current user tasks


