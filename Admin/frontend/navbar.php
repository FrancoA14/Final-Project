
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A14 Admin View</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header" style="height: 100px;"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                        class="fa fa-bars"></i></a>
                <div class="top-left-part">
                <a class="navbar-brand justify-content-center" href="../../User/index.php" style="height: 100px;">
                        <b class="logo-icon">
                            <img src="../../User/images/logo.png" class="dark-logo" />

                        </b>
                    </a>
                </div>
                <?php
                //checks if the variable user is set
                if(isset($_SESSION['fname'])){    
                  echo '<ul class="nav navbar-top-links navbar-right pull-right" style="height: 100px;">
                  <li>
                      <a class="profile-pic" href="#" style="height:100px; padding:25px 10px;"> <img src="../plugins/images/users/varun.jpg" alt="user-img"
                              width="36" class="img-circle"><b class="hidden-xs">'.$_SESSION['fname'].',</b> </a>
                  </li>
                </ul>';
                
                }
                
                ?>
                

                
            </div>
        </nav>

        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 50px 0 0;">
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Admin Dashboard</span></a>
                    </li>
                    <li>
                        <a href="members.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">A14 Members</span></a>
                    </li>
                    <li>
                        <a href="rides.php" class="waves-effect"><i class="fa fa-taxi" 
                                aria-hidden="true"></i><span class="hide-menu">&nbsp;&nbsp; Activity</span></a>
                    </li>
                    <li>
                        <a href="../../User/logout.php" class="waves-effect"><i class="fa fa-sign-out" 
                                aria-hidden="true"></i><span class="hide-menu">&nbsp;&nbsp; Logout</span></a>
                    </li>
                    
                    
                </ul>
                
            </div>
        </div>
        <!-- Left navbar-header end -->