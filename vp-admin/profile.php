<?php
include 'sidebar.php';
include 'top.php';
include 'functions.php';
include './db/db.php';
   error_reporting (E_ALL ^ E_NOTICE); 
      if(!isset($_SESSION['USER_LOGIN'])){
        ?>
        <script>
          window.location.href='index.php';
        </script>
      <?php
      }
 
     $first_name='';
     $last_name='';
     $email='';
     $username='';
     $image='';
 if(isset($_SESSION['USER_LOGIN'])){
  $image_required='';
  $user_id=$_SESSION['USER_ID'];
  $res=mysqli_query($con,"SELECT * FROM `admin` where id='$user_id'");
  $check=mysqli_num_rows($res);
  if($check>0){
     $row=mysqli_fetch_assoc($res);
     $firstname=$row['firstname'];
     $lastname=$row['lastname'];
     $email=$row['email'];
     $username=$row['username'];
     $image=$row['image'];
  }
}
if(isset($_POST['submit'])){
    $user_id=$_SESSION['USER_ID'];
      if($_FILES['image']['name']!=''){
        $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'./assets/img/avatars/'.$image);
        mysqli_query($con,"UPDATE `admin` SET `image`='$image' WHERE `id`='$user_id'");
    }
}
if(isset($_POST['submit1'])){
$username=get_safe_value($con,$_POST['username']);
$firstname=get_safe_value($con,$_POST['first_name']);
$lastname=get_safe_value($con,$_POST['last_name']);
$email=get_safe_value($con,$_POST['email']);
$user_id=$_SESSION['USER_ID'];
  mysqli_query($con,"UPDATE `admin` SET `username`='$username',`firstname`='$firstname',`lastname`='$lastname',`email`='$email' WHERE `id`='$user_id'");
}
?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4"><b>Profile:</b>&nbsp;<?php echo $_SESSION['USER_NAME']?></h3>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-body text-center shadow">
                                <form method="post" enctype="multipart/form-data">  
                                    <?php if($image!=''){?>
                                        <img src="./assets/img/avatars/<?php echo $image ?>" class="rounded-circle mb-3 mt-4 filemodule">  
                                        <?php } else{ ?>
                                            <img class="rounded-circle mb-3 mt-4 filemodule" src="assets/img/dogs/image2.jpeg">
                                    <?php } ?>  
                                        <label  style="display:table; font-size:30px; text-decoration:underline; margin:auto;">change
                                        <input type="file" name="image" style="display:none;"></label>
                                    <div class="mb-3">
                                        <div class="upload-btn1-wrapper">
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Upload a file</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                    </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>Username</strong></label><input class="form-control" type="text" placeholder="user.name" value="<?php echo $username ?>" name="username" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Email Address</strong></label><input class="form-control" type="email" placeholder="user@example.com" value="<?php echo $email ?>" name="email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label><strong>First Name</strong></label><input class="form-control" type="text" placeholder="John" value="<?php echo $firstname ?>" name="first_name" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label><strong>Last Name</strong></label><input class="form-control" type="text" placeholder="Doe" value="<?php echo $lastname ?>" name="last_name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="submit1">Save Settings</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php
     include 'footer.php';
     ?>