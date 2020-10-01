<?php
include 'header.php';
include './vp-admin/db/db.php';

$sql="SELECT * FROM `blog_article`";
 $res1=mysqli_query($con,$sql);
 $total_record=mysqli_num_rows($res1);
 $per_page=4;

$num=floor($total_record/$per_page);
$rem=floor($total_record%$per_page);
if($rem>0){
	$num++;
}
$start=0;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	$start=($start-1)*$per_page;
}

$sql.="WHERE status='1' ORDER BY `title` ASC limit $start,$per_page";
$res=mysqli_query($con,$sql);

?>
   <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Latest Articles</h2>
                <p class="text-center">For getting latest information of our site connecting with us by reading our latest arrival blogs on every news trending topics </p>
            </div>
            <div class="row">
                    <?php while($row=mysqli_fetch_array($res)){?>
                <div class="col-sm-6 col-md-4" style="border:1px solid green">
                    <a href="article?id=<?php echo $row['id']?>"><img class="img-fluid" src="./vp-admin/assets/img/article/<?php echo $row['blog_image']; ?>"></a>
                    <h3 class="name"><?php echo $row['title']; ?></h3>
                    <p class="description"><?php echo substr(strip_tags($row['content']),0,250); ?></p>
                    <a href="article?id=<?php echo $row['id']?>"><button class="btn btn-primary" style="margin-bottom:30px;"><span style="color:white;">Read More</span>
                    <i class="fa fa-arrow-circle-right" style="color:white;padding-left:6px"></i></butoon></a>
                </div>
                    <?php } ?>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <nav class="d-lg-flex justify-content-lg-middle dataTables_paginate paging_simple_numbers">
                        <ul class="pagination mx-auto">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <?php
                            for($i=1;$i<=$num;$i++){
                                echo '<li class="page-item active"><a class="page-link" href="blog.php?start='.$i.'">'.$i.'</a></li> &nbsp;';
                            }
                            ?>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
    <?php
include 'footer.php'; ?>