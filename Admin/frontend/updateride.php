<?php
//Navigate to appropriate directory for files
define('ROOT_PATH', dirname(__DIR__) . '/../');

//Get database connection
include(ROOT_PATH.'User/database.php');

// instantiate user object
include(ROOT_PATH.'User/rides.php');

 
session_start();
$database = new Database();
$db = $database-> getConnection();
$conn = $db;

    if(isset($_POST['updatedata']))
    {   
        
        $rideID=$_POST['rideID'];
        $newDate = date("Y-m-d", strtotime($_POST['rideDate']));

        $query = "UPDATE rides SET rideDate=$newDate
        WHERE rideID= $rideID";
        $stmt = $conn->prepare($query);
        $true = $stmt->execute();

        if($true){   
            echo "<script defer>";
            echo "alert('Done! Edit Sucessfull');      
            window.location.href='rides.php';
                </script>";
        }
        else{
            echo "<script defer>";
            echo "alert('Error! Unable to Edit. Please store user ID first.');
                
                </script>";
        }
        
    }
?>