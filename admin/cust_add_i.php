<?php include('partials/nav_bar.php'); ?>

<div class="admin_add">
    <div class="container">
        <h1>Add Individual Customer</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form action="" method="POST"> 
            <table class="table-40">

            <br/><br/>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="in_fname" placeholder="First Name"><td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="in_lname" placeholder="Last Name"><td>
                </tr>
                <tr>
                    <td>License No</td>
                    <td><input type="text" name="in_licenseno" placeholder="License No"><td>
                </tr>
                <tr>
                    <td>Insurance Name</td>
                    <td><input type="text" name="in_insurname" placeholder="Insurance Name"><td>
                </tr>
                <tr>
                    <td>Insurance No</td>
                    <td><input type="number" name="in_insurno" placeholder="Insurnace No"><td>
                </tr>
                <tr>
                    <td>Address Line 1</td>
                    <td><input type="text" name="c_addline1" placeholder="Address Line 1"><td>
                </tr>
                <tr>
                    <td>Address Line 2</td>
                    <td><input type="text" name="c_addline2" placeholder="Address Line 2"><td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td><input type="number" name="c_zip" placeholder="Zip Code"><td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="c_phone" placeholder="Phone"><td>
                </tr>
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
                        <input type="submit" name="submit" value="create individual customer" class="button button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //Process the value from form and save to database.
    //Check whether the submit button is clicked or not.

    if(isset($_POST['submit'])) {
        //Button clicked
        //echo "Admin created.";

        //Get data from the form
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
        $c_type = 'I';
        //Pass encryption with MD5
        $c_password = md5($_POST['c_password']);

        //SQL query from the form
        //SET column name = form name
        $SQL = "INSERT INTO mvx_customer
                SET c_type = '$c_type',
                    c_addline1 = '$c_addline1',
                    c_addline2 = '$c_addline2',
                    c_zip = '$c_zip',
                    c_phone = '$c_phone',
                    c_email = '$c_email',
                    c_password ='$c_password'
                ";
        
        //Execute SQL and save to database
        $RES = mysqli_query($CONN, $SQL) or die(mysqli_error($db));

        //After the insertion, get the c_id that was made by the database
        $SQL3 = "SELECT *
                 FROM mvx_customer
                 WHERE c_password = '$c_password'";
        
        $RES3 = mysqli_query($CONN, $SQL3);
        $ROWS3 = mysqli_fetch_assoc($RES3);
        $c_id = $ROWS3['c_id'];

        //SQL query from the form
        //SET column name = form name
        $SQL2 = "INSERT INTO mvx_individual
                SET c_id = $c_id,
                    in_fname = '$in_fname',
                    in_lname = '$in_lname',
                    in_licenseno = '$in_licenseno',
                    in_insurname = '$in_insurname',
                    in_insurno = '$in_insurno'
                ";
        
        //Execute SQL and save to database
        $RES2 = mysqli_query($CONN, $SQL2) or die(mysqli_error($db));

        //Check whether it has been inserted
        if($RES==TRUE && $RES2==TRUE) {
            //echo "Data inserted";
            $_SESSION['add'] = "Individual added successfully.";

            header("location:".SITEURL.'admin/man_cust.php');

        }
        else {
            //echo "Data insertion failed";
            $_SESSION['add'] = "Failed to add individual.";

            header("location:".SITEURL.'admin/man_cust.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>