<?php include ('../config/constants.php')?>

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
                    <img src="../images/logo.PNG" alt="Rental Logo" class="img-responsive">
                </div>

                <div class="menu text-right">
                    <ul>
                        <li>
                            <a href="<?php echo SITEURL;?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL;?>vehicles.php">Vehicles</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL;?>rent.php">Rent</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL;?>rent.php">Login</a>
                        </li>
                    </ul>
                </div>

                <div class="clearfix">
                </div>
            </div>
        </div>
    </body>
</html>