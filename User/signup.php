<?php
 
// get database connection
include_once("dbconnection.php");
 
// instantiate user object
include_once("member.php");
 
session_start();
$database = new Database();
$db = $database-> getConnection();
 
$member = new Member($db);
$errorPassword = "Passwords do not match";
$errorEmail = "Email is not available";
 
// set user property values
$member->fname = $_POST['fname'];
$member->lname = $_POST['lname'];
$member->phonenum = $_POST['phonenum'];
$member->email = $_POST['email'];
$member->address = $_POST['address'];
$member->password = base64_encode($_POST['password']);
$member->cpassword = base64_encode($_POST['confirm']);
$member->role = "0";
$member->datecreated = date('Y-m-d H:i:s');
 
// create the user
if($member->signup()){
    header("Location:signinPage.php");
    }
else{
    if($member->errEmail){
        $_SESSION["error"] = $errorEmail;
        header("location: signupPage.php");
    }
    if($member->errPass){
        $_SESSION["error"] = $errorPassword;
        header("location: signupPage.php");
    }
}
print_r(json_encode($member_arr));
?>