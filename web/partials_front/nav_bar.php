<?php include ('config/constants.php');?>


<html>
    <head>
        <title>
            World On Wheels - Home Page
        </title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo SITEURL;?>home.php">
                    <img src="../images/logo.PNG" alt="Rental Logo" class="img-responsive">
                    </a>
                </div>

                <div class="menu text-right">
                    <ul>
                        <li>
                            <a href="<?php echo SITEURL;?>home.php">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL;?>vehicles.php">Vehicles</a>
                        </li>
                        
                        <?php
                            if(isset($_SESSION['cust_login'])) {
                                ?>
                                    <li>
                                        <a href="<?php echo SITEURL;?>customer.php"><?php echo $_SESSION['cust_login'];?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITEURL;?>logout.php">Logout</a>
                                    </li>
                                <?php
                            }
                            else {
                                ?>
                                    <li>
                                        <a href="<?php echo SITEURL;?>login.php">Login</a>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>

                <div class="clearfix">
                </div>
            </div>
        </div>
    </body>
</html>