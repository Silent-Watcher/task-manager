<?php 
defined("BASE_PATH") or die("permission denied");


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
    $currentUserId = 1;
    $sql = "INSERT INTO folders (user_id,folderName)  VALUES({$currentUserId},:name);";
    $stmt = $db->prepare($sql);
    $stmt->execute(["name"=>$folderName]);
    return intval($db->lastInsertId());
}
// make new folder 

