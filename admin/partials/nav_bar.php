<?php include('../config/constants.php');
    include('login_check.php');
?>

<html>
    <head>
        <title>
            World On Wheels - Home Page
        </title>

        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
    <!-- Navigation Bar -->
        <div class="nav_bar">
            <div class="container">
                <div class="nav_logo">
                    <img src="../images/logo.PNG" alt="Rental Logo" class="img-responsive">
                </div>

                <div class="nav_menu text-right">
                    <ul>
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="man_veh.php">Vehicles</a>
                        </li>
                        <li>
                            <a href="man_admin.php">Admin</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>

                <div class="clearfix">
                </div>
            </div>
        </div>
    </body>
</html>