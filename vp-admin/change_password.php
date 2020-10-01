      <?php 
 include "sidebar.php";
 include 'top.php';
 include './db/db.php';
 include 'functions.php';
 error_reporting (E_ALL ^ E_NOTICE); 
     if(!isset($_SESSION['USER_LOGIN'])){
       ?>
       <script>
         window.location.href='index.php';
       </script>
       <?php
     }
$user_id=$_SESSION['USER_ID'];  //change password module 
$msg3='';
if(isset($_POST['submit'])){
 $oldpassword=get_safe_value($con,$_POST['oldpassword']);
 $newpassword=get_safe_value($con,$_POST['newpassword']);
 $repassword=get_safe_value($con,$_POST['retypepassword']);
 $res=mysqli_query($con,"SELECT * FROM `admin` WHERE `id`='$user_id' AND `password`='$oldpassword'");
 $check=mysqli_num_rows($res);
 if($check>0){
     if($newpassword==$repassword){
       mysqli_query($con,"UPDATE `admin` SET `password`='$newpassword' WHERE `id`='$user_id'");
     }
   else{
     $msg3="new password and re-type password not matched !!! ";
     }
 }else{
     $msg3="password Invalid";  
 }
}    //change password module end
?>

<div class="card shadow adjestment">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Change Password</p>
        </div>
        <div class="card-body">
            <form method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label><strong>Old Password</strong></label>
                      <input class="form-control" type="password" name="oldpassword" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label><strong>New Password</strong></label>
                      <input class="form-control" type="password" name="newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label><strong>Retype Password</strong></label>
                      <input class="form-control" type="text" name="retypepassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                  </div>
                </div>
              </div> 
              <ol>
                <li>Password must have 1 Special Symbol.</li>
                <li>Password must have 1 Capital letter.</li>
                <li>Password must have 1 Small letter.</li>
                <li>Password must have 1 Numeric Value.</li>
              </ol>
              <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="submit">Save&nbsp;</button></div>
              <div class="field_error"><?php echo $msg3?></div>  
            </form>
        </div>
    </div>


<?php  include "footer.php"; ?>        