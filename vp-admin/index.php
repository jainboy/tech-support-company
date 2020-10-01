<?php
 session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - KasperSky</title>
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="email" id="exampleInputEmail" placeholder="Enter Email Address..." name="email">
                                            </div>
                                        <div class="form-group">
                                        <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1" onclick="myFunction()">
                                                <label class="form-check-label custom-control-label" for="formCheck-1">Show Me</label>
                                                <script>
                                                        function myFunction() {
                                                            var x = document.getElementById("exampleInputPassword");
                                                            if (x.type === "password")
                                                            {
                                                                x.type = "text";
                                                            }
                                                            else
                                                            {
                                                                x.type = "password";
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" name="submit" type="submit">Login</button>   
                                    </form><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
<?php
ob_start();
    include './db/db.php';
    if(isset($_POST['submit'])){
        $username=$_POST['email'];
        $password=$_POST['password'];
        $res=mysqli_query($con,"SELECT * FROM `admin` WHERE `email`='$username' AND `password`='$password'");
            $check_user=mysqli_num_rows($res);
            if($check_user>0){
                $row=mysqli_fetch_assoc($res);
                $_SESSION['USER_LOGIN']='yes';
                $_SESSION['USER_ID']=$row['id'];
                $_SESSION['USER_NAME']=$row['username'];      
                $_SESSION['USER_IMAGE']=$row['image'];      
                ?>
                <script>
                    window.open('dashboard.php','_self');
                </script>
                <?php    
            }
            else
            {
            ?>
            <script>
                alert('username and password invalid !!');
                window.open('index.php','_self');
            </script>
            <?php        
            }
        }
    ?>