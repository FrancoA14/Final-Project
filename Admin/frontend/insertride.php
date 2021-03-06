<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
//Navigate to appropriate directory for files
define('ROOT_PATH', dirname(__DIR__) . '/../');

//Get database connection
include(ROOT_PATH.'User/database.php');

// instantiate user object
include(ROOT_PATH.'User/rides.php');

session_start();
//checks if the variable user is set
if(isset($_SESSION['fname'])){    
    echo '<h5 style="color: white;">Welcome ' . $_SESSION['fname'] . ',</h5>'; 
} 

else{    
    header("Location:loginPage.php");
}  

$database = new Database();
$db = $database-> getConnection();
$rides = new rides($db);                       
 

$rides->pickup = $_POST['pickup'];
$rides->destination = $_POST['destination'];
$rides->route=$_POST['route'];
$rides->capacity=$_POST['capacity'];
$rides->date = date("Y-m-d", strtotime($_POST['date']));
$rides->time = date("H:i:s", strtotime($_POST['time']));


if($rides->InsertRide()){
    echo '<script defer>';
    echo 'swal("Done!", "Ride was added successfully!", "success").then(function() {
        window.location = "rides.php";
    });
    </script>';
}else{
    echo '<script defer>';
    echo 'swal("Something went wrong!", "Sorry, ride insertion failed!", "error").then(function() {
        window.location = "rides.php";
    });
    </script>';
}

?>