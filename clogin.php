<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <section class="loginbg">
        <div class="clogin">
            <h1  class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['clogin']))
                {
                    echo $_SESSION['clogin'];
                 unset($_SESSION['clogin']);
                   
                   

                }
            else {
                echo"Please Login To Order";
            }
              /*  if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                  //  unset($_SESSION['no-login-message']);
                }*/
            ?>
            <br><br>

           
             
            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            
            <!-- Login Form Ends HEre -->

            <p  class="text-center">If don't have account? <a href="signin.php">Sign In</a></p>
            <br>
            <p  class="text-center">Already login? <a href="clogout.php">Log Out</a></p>
            
            <br>
            <p class="text-center">Created By - <a href="contact.php">CSIT07</a></p>
        </div>
            </section>
    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
         $username = $_POST['username'];
         $password = md5($_POST['password']);
       // $username = mysqli_real_escape_string($conn, $_POST['username']);
        
       // $raw_password = md5($_POST['password']);
       // $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            while($row=mysqli_fetch_assoc($res))
            {
                //get the values from individual columns
                $id = $row['id']; }
            $_SESSION['cid']=$id;
            $_SESSION['clogin'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['clogin'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'clogin.php');
        }


    }

?>