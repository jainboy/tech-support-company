<?php
include 'sidebar.php';
include 'top.php';
include 'functions.php';
include './db/db.php';

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="UPDATE `blog_article` set status='$status' where `id`='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="DELETE FROM `blog_article` WHERE `id`='$id'";
		mysqli_query($con,$delete_sql);
	}
 }
 
 $sql="SELECT * FROM `blog_article`";
 $res1=mysqli_query($con,$sql);
 $total_record=mysqli_num_rows($res1);
 $per_page=8;

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

$search=0;
 if(isset($_POST['search-txt']) && $_POST['search-txt']!=''){
    $search=$_POST['search-txt'];
    $sql.="WHERE `title` LIKE '%$search%' OR `category` LIKE '%$search%'";
}
$sql.="ORDER BY `title` ASC limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>
            <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0"><a href="blog.php">Blog</a></h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="manage_blog.php"><i class="fas fa-edit fa-sm text-white-50"></i>&nbsp;Add New</a></div>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <?php if($search!=''){?>
                            <p class="text-primary m-0 font-weight-bold">Search Info:&nbsp;<b><?php echo $search?></b></p>    
                        <?php }else{?>
                            <p class="text-primary m-0 font-weight-bold">Blog Info</p>
                            <?php }?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label>
                                <form method="post">
                                    <div class="input-group">
                                        <input class="bg-light form-control border-0 small" type="text" name="search-txt" placeholder="Search for ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary py-0" type="submit" name="search"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>       
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <!-- <th>S.No.</th> -->
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
									 <?php 
										while($row=@mysqli_fetch_assoc($res)){?>
                                 <tr>
                                       <td><img  width="30" height="30" src="./assets/img/article/<?php echo $row['blog_image']; ?>"></td>
                                       <td><?php   echo $row['title'];    ?> </td>
                                       <td><?php   echo $row['category'];    ?> </td>
                                       <td> <?php   echo $row['date'];    ?> </td>         
                                       <td> <?php   echo $row['author'];    ?> </td>  
                                       <td>
                                            <?php echo "<a href='manage_blog.php?id=".$row['id']."'><i class='fa fa-edit'></i></a>&nbsp;&nbsp;&nbsp;"; ?>
                                            <?php echo "<a href='?type=delete&id=".$row['id']."'><i class='fa fa-trash'></i></a>"; ?>
                                        </td>             				   		 
                                       <td>		 
											<?php
												if($row['status']==1){
													echo "<a href='?type=status&operation=deactive&id=".$row['id']."'><i class='fa fa-eye'></i></a>";
												}else{
													echo "<a href='?type=status&operation=active&id=".$row['id']."'><i class='fa fa-eye-slash'></i></a>";
												} ?>    
										</td>   
                                    </tr>
                                    <?php } ?>                                   
                                 </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Total Records of <?php echo mysqli_num_rows($res);?></p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
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
                </div>
            </div>
        </div>
       <?php
       include 'footer.php';
       ?>