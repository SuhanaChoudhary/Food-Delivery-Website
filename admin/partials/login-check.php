

<?php 
        //Authorization
        //Check whether the user is logged in or out

        if(!isset($_SESSION['user']))    //If user session is not set
        //user is not logged in
        //Redirect to login page with message
        $_SESSION['no-login-message']="<div class='error text-center'>Please Login to Acess Admin Panel.</div>";
        //REdirect to login page
        header('location:'.SITEURL.'admin/login.php');
?>
