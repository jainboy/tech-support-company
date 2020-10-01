<?php
include 'header.php'; 
include 'functions.php';
include './vp-admin/db/db.php';

if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $phone=get_safe_value($con,$_POST['phone']);
    $subject=get_safe_value($con,$_POST['subject']);
    $comments=get_safe_value($con,$_POST['comments']);
    $added_on=date('d:m:Y h:i:s');
    $result=mysqli_query($con,"INSERT INTO `contact_us`(`name`, `email`, `phone`, `subject`, `comment`, `added_on`) VALUES ('$name','$email','$phone','$subject','$comments','$added_on')");
    if($result==TRUE){?>
    <script>
    alert ('thank you for your feedback!!!!');
    </script>
    <?php }else{
        header('location:contact.php');?>
        <script>
        alert ('error detected on your query please try again!!!!');
        </script>
   <?php }
}
?>
      <div>
        <div class="container-fluid">
            <h1>Contact Information</h1>
            <hr>
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <h2 class="h4"><i class="fa fa-envelope"></i> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small>
                        </h2>
                        <form method="post">
                            <div class="form-group"><label for="from-name">Name</label><span class="required-input">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                    <input class="form-control" type="text" id="from-name" name="name" required="" placeholder="Full Name"></div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                    <div class="form-group"><label for="from-email">Email</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                            <input class="form-control" type="text" id="from-email" name="email" required="" placeholder="Email Address"></div>
                                        </div>
                                    </div>
                                <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                    <div class="form-group"><label for="from-phone">Mobile</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                                            <input class="form-control" type="text" id="from-phone" name="phone" required="" placeholder="Query Subject"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label for="from-email">Subject</label><span class="required-input">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-edit"></i></span></div>
                                    <input class="form-control" type="text" id="from-email" name="subject" required="" placeholder=" Subject"></div>
                            </div>
                            <div class="form-group"><label for="from-comments">Comments</label>
                            <textarea class="form-control" id="from-comments" name="comments" placeholder="Enter Comments" required rows="5"></textarea></div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col"><button class="btn btn-primary btn-block" type="submit"name="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                                </div>
                        </form>
                        </div>
                        <hr class="d-flex d-md-none">
                    </div>
            
                    <div class="col-12 col-md-6">
                        <h2 class="h4"><i class="fa fa-location-arrow"></i> Locate Us</h2>
                        <div class="form-row">
                            <div class="col-12">
                               <img class="img-fluid" style="margin-bottom:20px;" src="./assets/img/contact-us.jpg">
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                <div><span><strong>KasperSkyFree</strong></span></div>
                                <div><span>Support@Kasperskyfree.com</span></div>
                                <div><span>www.kasperskyfree.com</span></div>
                                <hr class="d-sm-none d-md-block d-lg-none">
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                <div><span><strong>Office Name</strong></span></div>
                                <div><span>55 Icannot Dr</span></div>
                                <div><span>Daytone Beach, FL 85150</span></div>
                                <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: 555-867-5309">Phone:</abbr> 555-867-5309</div>
                                <hr class="d-sm-none">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php
include 'footer.php'; ?>