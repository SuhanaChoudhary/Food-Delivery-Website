<?php include('partials-front/menu.php'); ?>
<?php 
               // if(isset($_SESSION['cid']))
               // {
                  //  echo $_SESSION['cid'];
                // unset($_SESSION['cid']);
                   
                   

               // }
?>

<?php 
        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
               
                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt=" Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    

                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <?php 
            //1. Get the ID of Selected Admin
          $id= $_SESSION['cid'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_customer WHERE id=$id";


            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $contact = $row['contact'];
                    $mail = $row['mail'];
                    $address = $row['address'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'clogin.php');
                }
            }
        
        ?>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" value="<?php echo $full_name; ?>"  class="input-responsive" required>

                   

                    <div class="order-label">Address</div>
                <input type="text" name="address" value="<?php echo $address; ?>"   class="input-responsive" required>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

//CHeck whether submit button is clicked or not
if(isset($_POST['submit']))
{
    // Get all the details from the form

    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty; // total = price x qty 

    $order_date = date("Y-m-d h:i:sa"); //Order DAte

    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

    $customer_name = $_POST['full-name'];
   // $customer_contact = $_POST['contact'];
   // $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];


    //Save the Order in Databaase
    //Create SQL to save the data
    $sql2 = "INSERT INTO tbl_order SET 
        food = '$food',
        price = $price,
        qty = $qty,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$contact',
        customer_email = '$mail',
        customer_address = '$address'
    ";

    //echo $sql2; die();

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //Check whether query executed successfully or not
    if($res2==true)
    {
        //Query Executed and Order Saved
        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
        header('location:'.SITEURL);
    }
    else
    {
        //Failed to Save Order
        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
        header('location:'.SITEURL);
    }

}

?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">CSIT07</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>