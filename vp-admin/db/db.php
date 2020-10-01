<?php 
$con=mysqli_connect('localhost','root','','kaspersky');
if($con==false)
{
    ?>
    <script>
        alert('connection error');
    </script>
    <?php
}
?>