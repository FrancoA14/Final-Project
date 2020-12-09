<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sign.css" rel="stylesheet">
    
    
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Facilities </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productspage.php">Products & Accessories </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="signinPage.php">Membership <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="starter-template">
        <h1>Become a member and enjoy our facilities.</h1>
    </div>

    <form name="MembershipForm" id="Memberform" style="margin: auto;" action="signup.php"class="info-form" method="POST">
        <h1 id = "app" style="text-align: center; color: white;">Sign Up</h1>
        <br>
        <div class = "field">
            <input type="text" style= "margin-left: 5%;" id="first" name="fname" placeholder="  First Name" required>
            <input type="text" style= "margin-left: 17%;" id="last" name="lname" placeholder="  Last Name" required>
        </div>
        <br>
        <div class = "field">
            <input type="text" style= "margin-left: 5%;" id="phonenum" name="phonenum" placeholder="  Phone Number" required>
            <input type="email" style= "margin-left: 17%;" id="email" name="email" placeholder="  Email" required>
        </div>
        <br>
        <div class = "field">
            <input type="text" style= "margin-left: 5%;" id="address" name="address" placeholder="  Address" required>
            <input type="password" style= "margin-left: 17%;" id="password" name="password" placeholder="  Password" required>
        </div>
        <br>
        <div class = "field">
            <input type="password" style= "margin-left: 32%;" id="confirm" name="confirm" placeholder="  Confirm Password" required>
        </div>
        <br>
        <?php
						if(isset($_SESSION["error"])){
							$error = $_SESSION["error"];
							echo "<div class='alert alert-danger'>
							<strong>Error!</strong> $error.
							</div>";
						}
        ?>
        <br>
        <div class ="field">
            <button style= "margin-left: 37%;"><b>Sign Up</b></button>
        </div>
        <br>
        <div class="link" style="margin-left: 28%; color: white;">
            Already have an account? <a href="signinPage.php">Sign-In</a>
        </div>   
    </form>
 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
