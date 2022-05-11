<?php include('partials/nav_bar.php'); ?>

<div class="admin_update">
    <div class="container">
        <h1>Update Admin</h1>

        <?php
            // Get the a_id
            $a_id = $_GET['a_id'];

            // SQL query 
            $SQL = "SELECT *
                    FROM mvx_admin
                    WHERE a_id = $a_id";

            // Execute the query
            $RES = mysqli_query($CONN, $SQL);

            // Actions after the query
            if($RES==TRUE) {
                $COUNT = mysqli_num_rows($RES);

                if ($COUNT==1) {
                    $ROW = mysqli_fetch_assoc($RES);

                    $a_fname = $ROW['a_fname'];
                    $a_lname = $ROW['a_lname'];
                    $a_username = $ROW['a_username'];
                }
                else {
                    header('location:'.SITEURL.'admin/man_admin.php');
                }
            }
        ?>

        <form action="" method="POST"> 
            <table class="table-40">

            <br/><br/>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="a_fname" value="<?php echo $a_fname;?>"><td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="a_lname" value="<?php echo $a_lname;?>"><td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="a_username" value="<?php echo $a_username;?>"><td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="a_password" placeholder="Password"><td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type ="hidden" name="a_id" value="<?php echo $a_id; ?>">
                        <input type="submit" name="submit" value="update admin" class="button button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //Check whether update button is pressed on
    if(isset($_POST['submit'])) {
        //echo "Button Clicked";
        //Get values inputted from the form
        $a_id = $_POST['a_id'];
        $a_fname = $_POST['a_fname'];
        $a_lname = $_POST['a_lname'];
        $a_username = $_POST['a_username'];

        //SQL query to update admin
        $SQL = "UPDATE mvx_admin
                SET a_fname = '$a_fname',
                    a_lname = '$a_lname',
                    a_username = '$a_username'
                WHERE a_id = '$a_id'";
        
        $RES = mysqli_query($CONN,$SQL);

        //Check the query if executed successfully
        if($RES==TRUE) {
            $_SESSION['update'] = "Admin updated successfully.";
            header('location:'.SITEURL.'admin/man_admin.php');
        }
        else {
            $_SESSION['update'] = "Admin failed to update.";
            header('location:'.SITEURL.'admin/man_admin.php');
        }
        
    }
?>

<?php include('partials/footer.php'); ?>