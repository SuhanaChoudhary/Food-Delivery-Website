<?php include('partials/menu.php'); ?>
    
    <!-- Mainh content Section Starts -->
    <div class="main-content">
     <div class="wrapper">
         <h1> Manage Admin</h1>
          <br/>    <br/>   <br/>  <br/> 

         <?php 
            if(isset($_SESSION['add']))
            {
               echo $_SESSION['add']; //Displaying Session message
               unset($_SESSION['add']); //Removing Session message
            }
            if(isset($_SESSION['delete']))
            {
               echo $_SESSION['delete']; //Displaying Session message
               unset($_SESSION['delete']); //Removing Session message
            }
            if(isset($_SESSION['update']))
            {
               echo $_SESSION['update']; //Displaying Session message
               unset($_SESSION['update']); //Removing Session message
            }
            if(isset($_SESSION['user-not-found']))
            {
               echo $_SESSION['user-not-found']; //Displaying Session message
               unset($_SESSION['user-not-found']); //Removing Session message
            }
            if(isset($_SESSION['pwd-not-match']))
            {
               echo $_SESSION['pwd-not-match']; //Displaying Session message
               unset($_SESSION['pwd-not-match']); //Removing Session message
            }
            if(isset($_SESSION['change-pwd']))
            {
               echo $_SESSION['change-pwd']; //Displaying Session message
               unset($_SESSION['change-pwd']); //Removing Session message
            }

         ?>
        <br> <br> <br>

         <!--Button to Add Admin -->
         <a href="add-admin.php" class="btn-primary">Add Admin</a>

         <br/> <br/>  <br/>   <br/>

         <table class="tbl-full">
            <tr>
                <th>S.NO.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>

            </tr>

         <?php 
         //query to get all Admin
         $sql="SELECT * FROM tbl_admin";
         //execute the query
         $res=mysqli_query($conn,$sql);

         //check whether the query is executed or not
         if($res==TRUE)
         {
             // count rows to check whether we have data in database
             $count= mysqli_num_rows($res); //Function to get all the rows in database

             $sn=1; //create a variable and assign the value

             //check the num of rows
             if($count>0)
             {
                 //we have data in database
                 while($rows=mysqli_fetch_assoc($res))
                 {
                     //using while loop to get data from database
                     //and while loop will run as ;long as we have data in databasse

                     //get individual data
                     $id=$rows['id'];
                     $full_name=$rows['full_name'];
                     $username=$rows['username'];

                     //Display the values in our table

                     ?>

                    <tr>
                         <td><?php echo $sn++; ?></td>
                         <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                         <td>
                             <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                             <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                             <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                         </td>
                    </tr>    

                    <?php
                 }
             }
             else{
                 //we dont have data  in database
             }

         }

         ?>

            
        </table>
        
       
    </div>
    </div>
    <!-- Main content Section ends -->

    <?php include('partials/footer.php') ?>