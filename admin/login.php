<?php include ('../config/constants.php'); ?>

<html>
    <head>
        <title>
            World On Wheels - Login
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
            </div>
        </div>
        <br><br><br>


    <!-- Vehicles Available -->
        <div class="login">
            <div class="container">
                <h1>Login</h1>
                
                <br>
                <?php 
                    if(isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if(isset($_SESSION['not_login'])) {
                        echo $_SESSION['not_login'];
                        unset($_SESSION['not_login']);
                    }
                ?>

                <form action="" method="POST"> 
                    <table class="table-40">

                        <br/>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="a_username" placeholder="Username"><td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="a_password" placeholder="Password"><td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="login" class="button button-secondary">
                                </td>
                            </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>

<?php 

    if(isset($_POST['submit'])) {

        //Get data from login
        $a_username = $_POST['a_username'];
        $a_password = md5($_POST['a_password']);

        //SQL query if the username & password exists
        $SQL = "SELECT *
                FROM mvx_admin
                WHERE a_username = '$a_username'
                    AND a_password = '$a_password'";

        $RES = mysqli_query($CONN, $SQL);

        $COUNT = mysqli_num_rows($RES);

        if($COUNT==1) {
            //If username and password exists
            $_SESSION['login'] = $a_username;
            header('location:'.SITEURL.'admin/');
        }
        else {
            //If username and password does not exist
            $_SESSION['login'] = "Username and password did not match.";
            header('location:'.SITEURL.'admin/login.php');
        }
        
    }

?>

<?php include('partials/footer.php'); ?>