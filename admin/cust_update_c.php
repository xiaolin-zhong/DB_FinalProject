<?php include('partials/nav_bar.php'); ?>

<div class="admin_update">
    <div class="container">
        <h1>Update Individual Customer</h1>

        <?php
            // Get the a_id
            $c_id = $_GET['c_id'];

            // SQL query 
            $SQL = "SELECT *
                    FROM mvx_customer
                    WHERE c_id = $c_id";

            // Execute the query
            $RES = mysqli_query($CONN, $SQL);

            // Actions after the query
            if($RES==TRUE) {
                $COUNT = mysqli_num_rows($RES);

                if ($COUNT==1) {
                    $ROWS = mysqli_fetch_assoc($RES);

                    $c_id = $ROWS['c_id'];
                    $c_addline1 = $ROWS['c_addline1'];
                    $c_addline2 = $ROWS['c_addline2'];
                    $c_zip = $ROWS['c_zip'];
                    $c_phone = $ROWS['c_phone'];
                    $c_email = $ROWS['c_email'];
                    $c_type = $ROWS['c_type'];
                }
                else {
                    header('location:'.SITEURL.'admin/man_cust.php');
                }
            }

            // SQL query 
            $SQL2 = "SELECT *
                    FROM mvx_corporate
                    WHERE c_id = $c_id";

            // Execute the query
            $RES2 = mysqli_query($CONN, $SQL2);

            // Actions after the query
            if($RES2==TRUE) {
                $COUNT2 = mysqli_num_rows($RES2);

                if ($COUNT2==1) {
                    $ROWS2 = mysqli_fetch_assoc($RES2);

                    $co_name = $ROWS2['co_name'];
                    $co_regisno = $ROWS2['co_regisno'];
                    $co_empid = $ROWS2['co_empid'];
                }
                else {
                    header('location:'.SITEURL.'admin/man_cust.php');
                }
            }
        ?>

        <form action="" method="POST"> 
            <table class="table-40">

                <tr>
                    <td>Corporate Name</td>
                    <td><input type="text" name="co_name" value="<?php echo $co_name;?>"><td>
                </tr>
                <tr>
                    <td>Registration</td>
                    <td><input type="text" name="co_regisno" value="<?php echo $co_regisno;?>"><td>
                </tr>
                <tr>
                    <td>Employee ID</td>
                    <td><input type="text" name="co_empid" value="<?php echo $co_empid;?>"><td>
                </tr>
                <tr>
                    <td>Address Line 1</td>
                    <td><input type="text" name="c_addline1" value="<?php echo $c_addline1;?>"><td>
                </tr>
                <tr>
                    <td>Address Line 2</td>
                    <td><input type="text" name="c_addline2" value="<?php echo $c_addline2;?>"><td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td><input type="number" name="c_zip" value="<?php echo $c_zip;?>"><td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="c_phone" value="<?php echo $c_phone;?>"><td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="c_email" value="<?php echo $c_email;?>"><td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type ="hidden" name="c_id" value="<?php echo $c_id; ?>">
                        <input type="submit" name="submit" value="update customer" class="button button-secondary">
                    </td>
                </tr>

            <br/><br/>
            </table>
        </form>
    </div>
</div>

<?php
    //Check whether update button is pressed on
    if(isset($_POST['submit'])) {
        //echo "Button Clicked";
        //Get values inputted from the form
        $c_id = $_POST['c_id'];
        $co_name = $_POST['co_name'];
        $co_regisno = $_POST['co_regisno'];
        $co_empid = $_POST['co_empid'];
        $c_addline1 = $_POST['c_addline1'];
        $c_addline2 = $_POST['c_addline2'];
        $c_zip = $_POST['c_zip'];
        $c_phone = $_POST['c_phone'];
        $c_email = $_POST['c_email'];

        //SQL query to update individual
        $SQL = "UPDATE mvx_corporate
                SET co_name = '$co_name',
                    co_regisno = $co_regisno,
                    co_empid = $co_empid
                WHERE c_id = '$c_id'";
        
        $RES = mysqli_query($CONN,$SQL);

        //SQL query to update customer
        $SQL2 = "UPDATE mvx_customer
                SET c_addline1 = '$c_addline1',
                    c_addline2 = '$c_addline2',
                    c_zip = '$c_zip',
                    c_phone = '$c_phone',
                    c_email = '$c_email'
                WHERE c_id = '$c_id'";
        
        $RES2 = mysqli_query($CONN,$SQL2);

        //Check the query if executed successfully
        if($RES==TRUE && $RES2==TRUE) {
            $_SESSION['update'] = "Corporate customer updated successfully.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
        else {
            $_SESSION['update'] = "Corporate customer failed to update.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>