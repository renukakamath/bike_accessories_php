<?php include 'connection.php';
 extract($_GET);
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="adminhome.php">Home</a>
    <a href="adminmanagestaff.php">Staff</a>
    <a href="adminmanagecategory.php">Category</a>
    <a href="adminmanagesubcat.php">SubCategory</a>
    <a href="adminmanagebrand.php">Brand</a>
    <a href="adminmanagevendors.php">Vendor</a>
    <a href="adminviewproducts.php">View products</a>
    <a href="adminvieworders.php">View Orders</a>
    <a href="index.php">Logout</a> -->
 <!--    <style>
        a{
            text-decoration: none;
            padding: 5px;
            color: red  ;
        }
    </style> -->

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
                <a href="adminhome.php" class="nav-item nav-link active">Home</a>
               
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Manage</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="adminmanagestaff.php" class="dropdown-item">Staff</a>
                        <a href="adminmanagecategory.php" class="dropdown-item">Category</a>
                        <a href="adminmanagesubcat.php" class="dropdown-item">SubCategory</a>
                        <a href="adminmanagebrand.php" class="dropdown-item">Brand</a>
                          <a href="adminmanagevendors.php" class="dropdown-item">Vendor</a>

                    </div>
                </div>
                 <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Views</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="adminviewproducts.php" class="dropdown-item">products</a>
                        <a href="adminvieworders.php" class="dropdown-item">Orders</a>
                       
                        
                    </div>
                </div>
                <a href="index.php" class="nav-item nav-link">Logout</a>
            </div>
            <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">  (>..<)  <i class=""></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

