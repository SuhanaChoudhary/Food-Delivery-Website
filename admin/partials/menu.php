<?php 
    include('../config/constants.php');
    

?>
<?php
    if(!isset($_SESSION['login'])){
        include('partials/login-check.php');
    }
    ?>
<html>
    <head>
        <title>Food Order Website - Home Page </title>

        <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Menu Section Starts -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="../images/logo.jpeg" title="Logo">
                    <img src="../images/logo.jpeg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="manage-category.php">Categories</a>
                    </li>
                    <li>
                        <a href="manage-food.php">Foods</a>
                    </li>
                    <li>
                        <a href="manage-order.php">Order</a>
                    </li>
                    <li>
                    <a href="admin-profile.php">Profile</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Menu Section ends -->