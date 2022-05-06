<?php  include('../config/constants.php');?>

<head>
       
        <link rel="stylesheet" href="../css/admin.css">
    </head>

<div class="loginbg">
     <div class="adminbg">
         <h1> Add Admin</h1>

         <br/> <br/> 

         <?php 
            if(isset($_SESSION['add'])) //Checking whether session is set or not
            {
               echo $_SESSION['add']; //Displaying Session message
               unset($_SESSION['add']); //Removing Session message
            }
         
         ?>

         <form action="" method="POST">
             <table class="tbl-30">
                  <tr>
                    <td>Full Name:</td>
                    <td><input text type="text" name="full_name" placeholder="Enter Your Name"></td>
                  </tr>

                  <tr>
                    <td>Username:</td>
                    <td><input text type="text" name="username" placeholder="Enter Your UserName"></td>
                  </tr>

                  <tr>
                    <td>Password:</td>
                    <td><input text type="password" name="password" placeholder="Enter Your Password"></td>
                  </tr>

                  <tr>
                    <td colspan="2"> 
                    <input text type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
                  </tr>
             </table>
         </form>
     </div>
</div>

<?php include('partials/footer.php'); ?>

<?php  
//Process the value from Form and Save it in Database

//Check whether the submit button is clickable or not

if(isset($_POST['submit']))
{
    //Button clicked
    //echo "Button Clicked";

    //1. Get the data from Form
    $full_name= $_POST['full_name'];
    $username= $_POST['username'];
    $password= md5($_POST['password']); //encryption of password through MD5
   
    //2. sql query to save the data into database
    $sql="INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";
    
   //3. Execute query and saving data in database
  
      $res = mysqli_query($conn,$sql) or die(mysqli_error());  //mysqli_error will display the message if querry is'nt executed  And DIE will stop the query

     //4.Check whether (query is executed) data is inserted or not and display appropriate message
     if($res==TRUE)
     {
       //DATA INSERTED
       //echo "Data Inserted";
       //create a session variable to display message

       $_SESSION['add']="<div class='success text-center'>Admin Added Successfully</div>";
       $_SESSION['login']="<div class='success text-center'>Logged in Successfully</div>";
       //Redirect page to manage-admin
       header("location:".SITEURL.'admin/index.php');

     } 
     else{
       //Data Not Inserted
       // echo"Fail to Insert Data"; 
       //create a session variable to display message

       $_SESSION['add']="<div class='error'>Failed to Add Admin</div>";

       //Redirect page to add-admin
       header("location:".SITEURL.'admin/add-admin.php');

     }

}


?>