<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    
    <!-- Validation -->
    <script src ="signin.js"></script>
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
        <h1>View your membership details here.</h1>
    </div>

    <form name="MembershipForm" id="Memberform" style="float: left;" class="info-form" action="signin.php" method="POST">
        <h2 id = "app" style="text-align: center; color: white;">Sign In</h2>
        <br>
        <div class = "field">
            <input type="text" id="email" name="email" placeholder="  Email" required>
        </div>
        <br>
        <div class = "field">
            <input type="password" id="password" name="password" placeholder="  Password" required>
        </div>
        <div class = "link" style="margin-left: 0%; color: white;">
						<input type="checkbox" onclick="toggle()">
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
        <div class ="field">
            <button id="submit" type="submit" value="click"><b>Sign In</b></button>
        </div>  
        <br> 
        <div class="link" style="margin-left: 12%; color: white;">
            Don't have an account? <a href="signupPage.php">Sign-Up</a>
        </div>
    </form>
  </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
 
</html>
