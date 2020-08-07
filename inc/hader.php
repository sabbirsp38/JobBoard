<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Formet.php'; ?>

<?php 
 $db = new Database();
 $fm = new Formet();
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Oficiona</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/et-line.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/css/plyr.css" />
    <link rel="stylesheet" href="assets/css/flag.css" />
    <link rel="stylesheet" href="assets/css/slick.css" /> 
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
        <a class="navbar-brand" href="index.php"> 
          <img src="images/logo.png" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto main-nav">
            <li class="menu-item active"><a title="Home" href="index.php">Home</a></li>
            <li class="menu-item dropdown">
              <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jobs</a>
              <ul  class="dropdown-menu">
                <li class="menu-item"><a href="job-listing.php">Job Listing</a></li>
                <li class="menu-item"><a href="Employers/post-job.php">Post Job</a></li>
              </ul>
            </li>
            <li class="menu-item ">
              <a  href="Job Poster.php">Employer Listing</a>
              
            </li>
            <li class="menu-item dropdown">
              <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Pages</a>
              <ul  class="dropdown-menu">
                <li class="menu-item"><a href="about-us.php">About Us</a></li>
                <li class="menu-item"><a href="contact.php">Contact Us</a></li>
                <li class="menu-item"><a href="terms-and-condition.php">Terms And Condition</a></li>
              </ul>
            </li>
            <li class="menu-item post-job"><a title="Title" href="Employers/post-job.php"><i class="fas fa-plus"></i>Post a Job</a></li>
          </ul>
          <ul class="navbar-nav ml-auto account-nav">
            <li class="menu-item login-popup"><a href="Employers/index.php" >Login</a></li>
            <li class="menu-item login-popup"><a href="register.php"  >Registration</a></li>
          </ul> 
        </div>
      </nav>
    </header>
    <!-- Header End -->