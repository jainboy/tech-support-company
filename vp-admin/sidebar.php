<?php
// error_reporting (E_ALL ^ E_NOTICE); 
    session_start();
    if ( $_SESSION['USER_NAME']==true)
    {
      $user_id=$_SESSION['USER_ID'];
      $username=$_SESSION['USER_NAME'];
      $userimage=$_SESSION['USER_IMAGE'];
    }
    else
    {
      header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - KasperSky</title>
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    </head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><img src="./assets/img/article/kaspersky.png" width="60px" height="60px" alt=""></div>
                    <div class="sidebar-brand-text mx-3"><span>KasperSky</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="category.php"><i class="fas fa-th-list"></i><span>Category</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blog.php"><i class="fas fa-edit"></i><span>Blog</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i><span>Query</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Admin</span></a></li> -->
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>