<?php include('partials/nav_bar.php'); ?>

<div class="admin_update_pw">
    <div class="container">
        <h1>Change Customer Password</h1>

        <br><br>

        <?php 
            if(isset($_GET['c_id'])) {
                $c_id = $_GET['c_id'];
            }
        ?>

        <form action="" method="POST">
            <table classs="table-40">
                <tr>
                    <td>New Password</td>
                    <td><input type ="password" name="new_password" placeholder="New Password"></td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td><input type ="password" name="conf_password" placeholder="Confirm Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type ="hidden" name="c_id" value="<?php echo $c_id; ?>">
                        <input type="submit" name="submit" value="change customer password" class="button button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    //Check if the submit button has been clicked
    if(isset($_POST['submit'])) {

        //Get the data from the form
        $c_id = $_POST['c_id'];
        $new_password = md5($_POST['new_password']);
        $conf_password = md5($_POST['conf_password']);

        //Check if the user with the current ID and PW exists
        $SQL = "SELECT *
                FROM mvx_customer
                WHERE c_id = '$c_id'";
        
        $RES = mysqli_query($CONN, $SQL);

        if($RES==TRUE) {
            //Check if data is available
            $COUNT = mysqli_num_rows($RES);

            //If current password matches the database, user exists.
            if($COUNT==1) {
                //echo "User found";
                //Check if the new and confirm password matches
                if($new_password == $conf_password) {
                    //Set new password
                    echo "here";
                    $SQL2 = "UPDATE mvx_customer
                             SET c_password = '$new_password'
                             WHERE c_id = $c_id";
                    //Execute query
                    $RES2 = mysqli_query($CONN, $SQL2);
                    //Check for execution
                    if($RES2==TRUE) {
                        //Update password if above checks pass
                        $_SESSION['password_updated'] = "Password successfully updated.";
                        header("location:".SITEURL.'admin/man_cust.php');
                    }
                    else {
                        $_SESSION['password_updated'] = "Password failed to be updated.";
                        header("location:".SITEURL.'admin/man_cust.php');
                    }

                }
                else {
                    $_SESSION['newconf_not_match'] = "New password and confirm password did not match.";
                    header("location:".SITEURL.'admin/man_cust.php');
                }

            }
        }
    }
?>

<?php include('partials/footer.php'); ?>