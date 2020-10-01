<?php
include './db/db.php';
// include 'functions.php';
// error_reporting(0);
$res=mysqli_query($con,"SELECT * FROM `contact_us` ORDER BY `comment` DESC LIMIT 5");
$res1=mysqli_query($con,"SELECT * FROM `blog_article` ORDER BY `title` DESC LIMIT 5");
?>

<div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($res)?></span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <?php 
                                                while($row=@mysqli_fetch_assoc($res)){?>
                                        <a class="d-flex align-items-center dropdown-item" href="contact.php">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-comment text-white"></i></div>
                                            </div>
                                            <div>
                                                <span class="small text-gray-500"><?php   echo $row['added_on'];    ?> </span>
                                                <p><?php  echo $row['comment'];?></p>
                                                <?php } ?>      
                                            </div>
                                        </a>
                                        <a class="text-center dropdown-item small text-gray-500" href="contact.php">Show All Alerts</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($res1)?></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <?php   while($row=mysqli_fetch_assoc($res1)){?>
                                        <a class="d-flex align-items-center dropdown-item" href="manage_blog.php?id=<?php echo $row['id'];?>">
                                            <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="./assets/img/article/<?php echo $row['blog_image']; ?>">
                                                <?php if($row['status']=='1'){?>
                                                    <div class="bg-success status-indicator"></div>
                                                <?php } else{?>
                                                    <div class="bg-danger status-indicator"></div>
                                                <?php   }?>
                                            </div>
                                            <div class="font-weight-bold"> 
                                                <div class="text-truncate"><span><?php   echo $row['title']; ?></span></div>
                                                <p class="small text-gray-500 mb-0"><?php   echo $row['author']; ?> - <?php   echo $row['date']; ?></p>
                                            </div>      
                                        </a>
                                        <?php }?>
                                        <a class="text-center dropdown-item small text-gray-500" href="blog.php">Show All Alerts</a></div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="profile.php">
                                <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['USER_NAME']?></span>
                                <img class="border rounded-circle img-profile" src="assets/img/avatars/<?php echo $_SESSION['USER_IMAGE']?>"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="profile.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <a class="dropdown-item" role="presentation" href="change_password.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                            <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>