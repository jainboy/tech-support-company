<?php
    ob_start();
    include 'sidebar.php';
    include 'top.php';
    include 'functions.php';
    include './db/db.php';
   $categories='';
   $description='';
   $msg='';
   if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"SELECT * FROM `category` WHERE `id`='$id'");
      $check=mysqli_num_rows($res);
      if($check>0){
         $row=mysqli_fetch_assoc($res);
         $categories=$row['category_name'];
         $description=$row['category_description'];
      }
      else{
        header('location:category.php');
         die();
      }
   }
   if(isset($_POST['submit'])){
      $categories=get_safe_value($con,$_POST['cat_name']);
      $description=get_safe_value($con,$_POST['description']);
   	$res=mysqli_query($con,"SELECT * FROM `category` WHERE `category_name`='$categories'");
   	$check=mysqli_num_rows($res);
   	if($check>0){
   		if(isset($_GET['id']) && $_GET['id']!=''){
   			$getData=mysqli_fetch_assoc($res);
   			if($id==$getData['id']){
            
   			}else{
   				$msg="Categories already exist";
   			}
   		}else{
   			$msg="Categories already exist";
   		}
   	} 
   	if($msg==''){
   		if(isset($_GET['id']) && $_GET['id']!=''){
   			mysqli_query($con,"UPDATE `category` SET `category_name`='$categories',`category_description`='$description' WHERE `id`='$id'");
   		}else{
   			mysqli_query($con,"INSERT INTO `category`(`category_name`, `category_description`,`status`) VALUES ('$categories','$description','1')");
         }
         header('location:category.php');
   		die();
   	}
   }
?>
    <div class="card shadow adjestment">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Category</p>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label><strong>Category Name</strong></label>
                    <input class="form-control" type="text" value="<?php echo $categories?>" name="cat_name">
                </div>
                <div class="form-group">
                    <label><strong>Description</strong></label>
                    <textarea class="form-control" name="description" rows="10"><?php echo $description?></textarea>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="submit">Save&nbsp;</button></div>
                <div class="field_error"><?php echo $msg?></div>
            </form>
        </div>
    </div>
<?php
include 'footer.php';
?>