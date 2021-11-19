<?php defined("BASE_PATH") or die("permission denied");

// logout
function logout(){
    unset($_SESSION["login"]);
}
// logout

// get currrent user id 
function getCurrentUserId() {
    // return $_SESSION["login"]->id ; 
    return getLoggedInUser() ? getLoggedInUser()->id : null ;
    // get logged in user id 
}
// get currrent user id 

// getloggedin user
function getLoggedInUser(){
    return $_SESSION["login"] ?? null;
}
// getloggedin user

// is user logged in 
function isLoggedIn(){
   return (isset($_SESSION["login"]) and !empty($_SESSION["login"])) ? true : false;
}
// is user logged in 

function getUserByEmail(string $email = null){
    global $db; 
    $sql = "SELECT * FROM users where email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(["email"=>$email]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $result ->image = "https://www.gravatar.com/avatar/" . md5( strtolower( trim(  $result->email ) ) );
    return $result ?? null;
}
// login
function login(string $userEmail = null , string $userPass = null){

    $user = getUserByEmail($userEmail);
    // check if the email is exist
    if(is_null($user)){
        return false;
    }
    // check if the email is exist
    // check if the password is correct
    if(@password_verify($userPass,$user->password)){
        $_SESSION["login"] = $user;
        return true;
    }
    // check if the password is correct
    return false;

}
// login

// register
function register(array $userData = null){
    global $db;
    // check if the emal is correct
    if (!filter_var($userData["email"], FILTER_VALIDATE_EMAIL)) {
        return false ;
    }
    // check if the emal is correct
    // check if the password is strong
    if(!passwordChecker($userData["password"])){
        return false;
    }
    // check if the password is strong
    // encrypt valid password 
    $userPass = password_hash($userData["password"],PASSWORD_BCRYPT);
    // encrypt valid password
    $sql = "INSERT INTO users (userName,email,password) VALUES(:name,:email,:pass)";
    $stmt = $db->prepare($sql);
    $stmt->execute(["name"=>$userData["username"],"email"=>$userData["email"],"pass"=>$userPass]);
    return $stmt->rowCount() ? true : false ; 

}
// register


