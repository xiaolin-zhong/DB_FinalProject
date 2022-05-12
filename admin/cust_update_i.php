<?php include('partials/nav_bar.php'); ?>

<div class="cust_update">
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
                    FROM mvx_individual
                    WHERE c_id = $c_id";

            // Execute the query
            $RES2 = mysqli_query($CONN, $SQL2);

            // Actions after the query
            if($RES2==TRUE) {
                $COUNT2 = mysqli_num_rows($RES2);

                if ($COUNT2==1) {
                    $ROWS2 = mysqli_fetch_assoc($RES2);

                    $in_fname = $ROWS2['in_fname'];
                    $in_lname = $ROWS2['in_lname'];
                    $in_licenseno = $ROWS2['in_licenseno'];
                    $in_insurname = $ROWS2['in_insurname'];
                    $in_insurno = $ROWS2['in_insurno'];
                }
                else {
                    header('location:'.SITEURL.'admin/man_cust.php');
                }
            }
        ?>

        <form action="" method="POST"> 
            <table class="table-40">

                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="in_fname" value="<?php echo $in_fname;?>"><td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="in_lname" value="<?php echo $in_lname;?>"><td>
                </tr>
                <tr>
                    <td>License</td>
                    <td><input type="text" name="in_licenseno" value="<?php echo $in_licenseno;?>"><td>
                </tr>
                <tr>
                    <td>Insurance</td>
                    <td><input type="text" name="in_insurname" value="<?php echo $in_insurname;?>"><td>
                </tr>
                <tr>
                    <td>Insurance No</td>
                    <td><input type="number" name="in_insurno" value="<?php echo $in_insurno;?>"><td>
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
        $in_fname = $_POST['in_fname'];
        $in_lname = $_POST['in_lname'];
        $in_licenseno = $_POST['in_licenseno'];
        $in_insurname = $_POST['in_insurname'];
        $in_insurno = $_POST['in_insurno'];
        $c_addline1 = $_POST['c_addline1'];
        $c_addline2 = $_POST['c_addline2'];
        $c_zip = $_POST['c_zip'];
        $c_phone = $_POST['c_phone'];
        $c_email = $_POST['c_email'];

        //SQL query to update individual
        $SQL = "UPDATE mvx_individual
                SET in_fname = '$in_fname',
                    in_lname = '$in_lname',
                    in_licenseno = '$in_licenseno',
                    in_insurname = '$in_insurname',
                    in_insurno = $in_insurno
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
            $_SESSION['update'] = "Individual updated successfully.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
        else {
            $_SESSION['update'] = "Individual failed to update.";
            header('location:'.SITEURL.'admin/man_cust.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>