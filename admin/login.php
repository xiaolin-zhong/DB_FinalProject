<?php include('partials/nav_bar.php'); ?>

        <div class="login">
            <div class="container">
                <h1>Login</h1>

                <?php
                    if(isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset ($_SESSION['login']);
                    }
                ?>    

                <form action="" method="POST">
                    <table class="table-40">
                    <br/><br/>
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

<?php include('partials/footer.php'); ?>

<?php 
    //Check for the login button click
    if(isset($_POST['submit'])){
        //Get the data from the form
        $a_username = $_POST['a_username'];
        $a_password = $_POST['a_password'];

        //SQL query to check whether the username and password exists or not
        $SQL = "SELECT *
                FROM mvx_admin
                WHERE a_username = '$a_username'
                    AND a_password = '$a_password'";

        //Execute SQL query
        $RES = mysqli_query($CONN, $SQL);

        //Check if user exists or not
        $COUNT = mysqli_num_rows($RES);
        if($COUNT==1) {
            $_SESSION['login'] = "Login successful.";
            header('location:'.SITEURL.'admin/');
        }
        else {
            $_SESSION['login'] = "Username or password did not match.";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>