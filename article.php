<?php
include 'header.php'; 
include 'functions.php';
include './vp-admin/db/db.php';
$id=$_GET['id'];
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * From blog_article WHERE id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $content=$row['content']; 
        $author=$row['author'];
        $category=$row['category']; 
        $date=$row['date']; 
        $image=$row['blog_image'];
    }
    else{
        header('location:blog');
         die();
      }
}
?>

  <div class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h1 class="text-center"><?php echo $title ?></h1>
                        <p class="text-center"><span class="by">by</span> <a href="#"style="text-transform: uppercase;color: #005446;">&nbsp;<?php echo $author ?></a>
                        <span class="date">&nbsp;<?php echo date_format(new DateTime($date),'d-M-Y'); ?> </span>
                        <span style="text-transform: uppercase;color: #005446;">&nbsp;<?php echo $category ?> </span></p>
                        <img class="img-fluid banner1" src="./vp-admin/assets/img/article/<?php echo $image ?>"><br></div>
                    <div class="text">
                        <p><?php echo $content ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include 'footer.php'; ?>