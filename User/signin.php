<?php
// include database and object files
include_once "dbconnection.php";
include_once "member.php";


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$member = new Member($db);

//Error messages to be displayed is login credentials are not corrects
$errorlogin = "Incorrect Login credentials";

//Set variables
$member->login = isset($_POST['email']) ? $_POST['email'] : die('error');
$member->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die('error'));

$stmt = $member->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();    
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['UserID'] = $row['UserID'];
    $_SESSION['role'] = $row['role'];

    
    if($row['role'] == 0){
        header("Location:mypage.php");
    }
    if($row['role'] == 1){
        header('Location: ..\Admin\frontend\index.php');
    }
}
else{
    session_start();
    $_SESSION["error"] = $errorlogin;
    header("location: signinPage.php");
}

?>