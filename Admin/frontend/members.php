<?php
define('ROOT_PATH', dirname(__DIR__) . '/../');
include(ROOT_PATH.'User/dbconnection.php');
include_once(ROOT_PATH.'User/member.php');
include('navbar.php');

session_start();
//checks if the variable user is set
if(isset($_SESSION['fname'])){ 
    if($_SESSION['role'] ==0){ 
        header("Location:../../User/index.php");
    }    
}else{
    header("location:../../User/LoginPage.php"); 
}
?>
<style>
    th {
        font-weight: 600;
        font-size: 12pt;
        color: white;
        background-color: #9c2222c9;
    }
</style>

            <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title" style="color:black; font-size: 16pt;">Users </h4>
            </div>
        </div>
    <div>
        <?php
        // get database connection
        $database = new Database();
        $db = $database->getConnection();
            
        // prepare user object
        $users = new Member($db);
        $conn = $db;

        $stmt = $users->allmembers();

        // Return the number of rows in result set
        $rowcount=$stmt->rowCount();
    
        if($stmt->rowCount() > 0){
            //All echos display html elements
            echo '
            
            <table class="table table-dark table-striped">';
            echo '<thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Date Created</th>
                    <th> </th>   
                    <th> </th> 
                    <th> </th>  
                </tr>
                </thead>';
            // Fill the table body with the values
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                     
                echo "<tr>
                        <td>{$row["UserID"]}</td>
                        <td>{$row["fname"]}</td>
                        <td>{$row["lname"]}</td>
                        <td>{$row["phonenum"]}</td>
                        <td>{$row["email"]}</td>
                        <td>{$row["address"]}</td>
                        <td>{$row["password"]}</td>
                        <td>{$row["role"]}</td>
                        <td>{$row["datecreated"]}</td>
                        <td><form method= 'post' action ='members.php' id='form'><button type='submit' name='edit' value ="; echo $row["UserID"]; 
                        echo ">Store ID</button></form></td>
                        <td><button type='submit' data-toggle='modal' data-target='#editmodal'> Edit</button></td>
                        <td><button ><a href ='users.php?delete=$row[UserID]' name='Del'> Delete </a></button></td>
                            
                    </tr>";}
            echo  "</table>";
        }

        if(isset($_GET['delete'])){
            $query = "DELETE  
            FROM
                users
            WHERE
            UserID ='$_GET[delete]'";
            // prepare query statement
            $stmt = $conn->prepare($query);
            // execute query
            $stmt->execute();

            if($stmt->execute()){
                echo "<script>";
                echo "alert('Done! Delete Sucessfull.');      
                    window.location.href='users.php';
                    </script>";
            }else{
                echo '<script>'; 
                echo 'alert("Error! Unable to delete user"); 
                    window.location.href="users.php"; 
                    </script>';
            }
            header("location:users.php");    
        }
            ?>
    </div>
    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit User Permissions </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="updateuser.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Change role (Admin = 0, User = 1) </label>
                            <select class="form-control" name="role" required>
                                <option value="" selected>---Choose Role---</option>
                                <option value= 0 >0</option>
                                <option value= 1 >1</option>			
                            </select>
                            <input type="hidden" value= " <?php echo $_POST['edit']; ?>" name="userID">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer text-center"> 2020 &copy; ASHTRANSIT </footer>      
</div>
<script>
$('#Form').on('submit', function(e){
  $('#editModal').modal('show');
  e.preventDefault();
});
</script>

<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
