<?php include('partials-front/menu.php'); ?>

<section class="loginbg">
<div class="main-content">
     <div class="wrapper">
        
         <br/> <br/> 

         <?php 
            if(isset($_SESSION['cadd'])) //Checking whether session is set or not
            {
               echo $_SESSION['cadd']; //Displaying Session message
               unset($_SESSION['cadd']); //Removing Session message
            }
         
         ?>


        <div class="clogin">
            <h1  class="text-center">Sign In</h1>
            <br><br>
         <form action="" method="POST">
             <table class="tbl-30">
                  <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name" required></td>
                  </tr>

                  <tr>
                    <td>Username:</td>
                    <td><input  type="text" name="username" placeholder="Enter Your UserName" required></td>
                  </tr>

                  <tr>
                    <td>Password:</td>
                    <td><input  type="password" name="password" placeholder="Enter Your Password"   required></td>
                  </tr>

                  <tr>
                    <td>Contact:</td>
                    <td><input  type="text" name="contact" placeholder="E.g. 9843xxxxxx"  required></td>
                  </tr>

                  <tr>
                    <td>Email:</td>
                    <td><input type="email" name="mail" placeholder="E.g. xyz@gmail.com" class="input-responsive" required></td>
                  </tr>

                  <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" placeholder="E.g. Street,City,State" required></td>
                  </tr>

                  <tr>
                    <td colspan="2"> 
                    <input  type="submit" name="submit" value="Sign In" class="btn-secondary"></td>
                  </tr>
             </table>
         </form>
          </div>
          </section>
     </div>
</div>

<!-- footer Section Starts Here -->
<section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">CSIT07</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->



<?php  
//Process the value from Form and Save it in Database

//Check whether the submit button is clickable or not



//Start Session
//session_start();

// Create constant to store Non Repeating values      [constants are always in capital letters]
//define('SITEURL',"http://localhost/food-order/");
//define('LOCALHOST', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'food-order');

//$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // DATABASE CONNECTION syntax is (host,database username,databsae password)
//$db_select=mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // selecting Database


if(isset($_POST['submit']))
{
    //Button clicked
    //echo "Button Clicked";

    //1. Get the data from Form
    $full_name= $_POST['full_name'];
    $username= $_POST['username'];
    $password= md5($_POST['password']); //encryption of password through MD5
    $contact= $_POST['contact'];
    $address= $_POST['address'];
    $mail= $_POST['mail'];
   
    //2. sql query to save the data into database
    $sql="INSERT INTO tbl_customer SET
    full_name='$full_name',
    username='$username',
    password='$password',
    contact= '$contact',
    address= '$address',
    mail= '$mail'

    ";
    
   //3. Execute query and saving data in database
  
      $res = mysqli_query($conn,$sql) or die(mysqli_error());  //mysqli_error will display the message if querry is'nt executed  And DIE will stop the query

     //4.Check whether (query is executed) data is inserted or not and display appropriate message
     if($res==TRUE)
     {
       //DATA INSERTED
       //echo "Data Inserted";
       //create a session variable to display message
     //  $id = $_GET['id'];
      //     $_SESSION['cid']=$id;
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
              $id = $row['id']; 
          $_SESSION['cid']=$id;} }
       $_SESSION['clogin']="<div class='success'>Login Successfully</div>";
       $_SESSION['cadd']="<div class='success'>Customer Added Successfully</div>";

       //Redirect page to manage-admin
       header("location:".SITEURL.'index.php');

     } 
     else{
       //Data Not Inserted
       // echo"Fail to Insert Data"; 
       //create a session variable to display message

       $_SESSION['add']="<div class='error'>Failed to Add Customer</div>";

       //Redirect page to add-admin
       header("location:".SITEURL.'signin.php');

     }

}


?>