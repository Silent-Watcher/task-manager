<?php 

// defined("BASE_PATH") or die("permission denied");
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
