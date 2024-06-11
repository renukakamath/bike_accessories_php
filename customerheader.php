<?php include 'connection.php' ?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="customer_searchproduct.php">Search</a>
	<a href="customer_buy.php">Cart</a>
	<a href="customer_myorders.php">MY Orders</a>
	<a href="index.php">Logout</a>
	 <style>
        a{
            text-decoration: none;
            padding: 5px;
            color: red  ;
        }
    </style>
 -->

      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bike Accessories</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class=""><i class=""></i>BikeServ</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="customerhome.php" class="nav-item nav-link active">Home</a>
               
               
                  <a href="customer_searchproduct.php" class="nav-item nav-link active">Search</a>

                  <?php 

                  $q="select * from ordermaster where status='pending'";
                  $res=select($q);

                  if (sizeof($res)>0) {?>
                  	 <a href="customer_buy.php" class="nav-item nav-link">Buy</a>
                  <?php }

                   ?>
               
                <a href="customer_myorders.php" class="nav-item nav-link">My Orders </a>
                <a href="index.php" class="nav-item nav-link">Logout</a>
            </div>
            <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">  (>..<)  <i class=""></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

