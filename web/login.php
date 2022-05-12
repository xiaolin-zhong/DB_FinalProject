<?php include('partials_front/nav_bar.php');?>

    <!-- Vehicles Available -->
        <div class="login">
            <div class="container">
                <h1>Login</h1>
                
                <br>
                <?php 
                    if(isset($_SESSION['cust_login'])) {
                        echo $_SESSION['cust_login'];
                        unset($_SESSION['cust_login']);
                    }
                    if(isset($_SESSION['cust_type'])) {
                        echo $_SESSION['cust_type'];
                        unset($_SESSION['cust_type']);
                    }
                    if(isset($_SESSION['cust_id'])) {
                        echo $_SESSION['cust_id'];
                        unset($_SESSION['cust_id']);
                    }
                    if(isset($_SESSION['cust_not_login'])) {
                        echo $_SESSION['cust_not_login'];
                        unset($_SESSION['cust_not_login']);
                    }
                ?>

                <form action="" method="POST"> 
                    <table class="table-40">

                        <br/>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="c_email" placeholder="Email"><td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="c_password" placeholder="Password"><td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="login" class="btn btn-primary">
                                </td>
                            </tr>
                    </table>
                    <br>
                    <p class="text-left">
                        If you have forgotten your password, please contact an agent.
                    </p>
                    <p class="text-left">
                        <a href="<?php echo SITEURL;?>create_acc_i.php">Create an Individual Account</a>
                    </p>
                    <p class="text-left">
                        <a href="<?php echo SITEURL;?>create_acc_c.php">Create an Corporate Account</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>

<?php 

    if(isset($_POST['submit'])) {

        //Get data from login
        $c_email = $_POST['c_email'];
        $c_password = md5($_POST['c_password']);

        //SQL query if the username & password exists
        $SQL = "SELECT *
                FROM mvx_customer
                WHERE c_email = '$c_email'
                    AND c_password = '$c_password'";

        $RES = mysqli_query($CONN, $SQL);

        $COUNT = mysqli_num_rows($RES);
        $ROW = mysqli_fetch_assoc($RES);
        $c_type = $ROW['c_type'];

        if($COUNT==1) {
            //If username and password exists
            $_SESSION['cust_login'] = $c_email;
            $_SESSION['cust_type'] = $c_type;
            header('location:'.SITEURL);
        }
        else {
            //If username and password does not exist
            $_SESSION['cust_login'] = "Username and password did not match.";
            header('location:'.SITEURL.'login.php');
        }
        
    }

?>

<?php include('partials_front/footer.php')?>