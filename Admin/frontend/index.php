<?php
session_start();
include('navbar.php');

    //checks if the variable user is set
    if(isset($_SESSION['fname'])){
        if($_SESSION['role'] == 0){ 
            header("Location:../../User/homepage.php");    
        }
    }
    else{
        header("location:../../User/signinPage.php"); 
    }


    if(isset($_SESSION['Message'])){
        echo "<script type='text/javascript'>
            alert('" . $_SESSION['errorMessage'] . "');
          </script>";
        unset($_SESSION['Message']);
    }
    
    ?>
 

<style>
    th {
         font-weight: 600;
         font-size: 12pt;
         color: white;
         background-color: #9c2222c9;
    }

    .white-box{
        border: 2px solid orange;
    }

</style>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title" style="color:black; font-size: 16pt;">Dashboard</h4>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                    define('ROOT_PATH', dirname(__DIR__) . '/../');
                    include_once(ROOT_PATH.'User/dbconnection.php');
                    include_once(ROOT_PATH.'User/member.php');
                    include_once(ROOT_PATH.'User/gymtime.php');
                    

                    // get database connection
                    $database = new Database();
                    $db = $database->getConnection();
                        
                    $member = new Member($db);
                    $query_run = $member->allmembers();

                    $members = new Member($db);
                    // Return the number of rows in result set
                    $MemberRowCount=$query_run->rowCount();

                    //for bus ride count
                    //$rides = new rides($db);
                    //$stmt = $rides->AllRides();
                    //$stmtday = $rides->DayRides();
                    
                    // Return the number of rows in result set
                    //$RideRowCount=$stmt->rowCount();
                    //$DayRideRowCount=$stmtday->rowCount();
                    ?>
            
                
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                        class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb" style="color: black; padding: 10px 0; font-weight:bolder;">
                                    Registered Users</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger" style="color: green;"><?php
                                    echo "$MemberRowCount";?></h3><!-- query to count all users -->
                                </div> 
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                        class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb" style="color: black; padding: 10px 0; font-weight:bolder;">
                                    Published Rides</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger" style="color: green;"><?php
                                    echo "$RideRowCount";?></h3><!-- query to count all users -->
                                </div> 
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                        class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb" style="color: black; padding: 10px 0; font-weight:bolder;">
                                    Today's Trips</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger" style="color: green;"><?php
                                    echo "$DayRideRowCount";?></h3><!-- query to count all users -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>



                <!-- /.row -->            
            <div class="row">
                <?php
                $conn = $db;

                $stmts = $rides->DayRides();
                if($stmts->rowCount() > 0){
                    //All echos display html elements
                    echo '
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title" style="color:black; font-size: 16pt;">Today\'s Trips</h4>
                        </div>
                    </div>
                    <table class="table table-dark table-striped">';
                    echo '<thead>
                        <tr>
                            <th>RideDate</th>
                            <th>RideTime</th>
                            <th>Capacity</th>
                            <th>Route</th>
                            <th>Pickup</th>
                            <th>Destination</th>
                            <th> </th>   
                        </tr>
                        </thead>';
                    // Fill the table body with the values
                    while($row = $stmts->fetch(PDO::FETCH_ASSOC)) {            
                        echo "<tr>
                                <td>{$row["rideDate"]}</td>
                                <td>{$row["rideTime"]}</td>
                                <td>{$row["capacity"]}</td>
                                <td>{$row["route"]}</td>
                                <td>{$row["pickup"]}</td>
                                <td>{$row["destination"]}</td>
                                <td><button style = 'color:red'><a href ='rideInfo.php?info=$row[RideID]' name='Del' style = 'color:red'> More Info </a></button></td>
                                  
                            </tr>";}
                    echo  "</table>";
                }
                else{
                    echo' <div class="alert alert-danger" style="margin: 60px 0 0 0;">
                    <strong>Error!</strong> No records found.</div>';
                }
                    ?>
                    
            </div>
                
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; ASHTRANSIT </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    
    </script>
</body>

</html>