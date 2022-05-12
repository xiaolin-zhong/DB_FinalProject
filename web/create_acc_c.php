<?php include('partials_front/nav_bar.php');?>

<div class="cust_add">
    <div class="container">
        <h1>Add Corporate Customer</h1>

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
                    <td>Corporate Name</td>
                    <td><input type="text" name="co_name" placeholder="Corporate Name"><td>
                </tr>
                <tr>
                    <td>Registration No</td>
                    <td><input type="number" name="co_regisno" placeholder="Registration No"><td>
                </tr>
                <tr>
                    <td>Employee ID</td>
                    <td><input type="number" name="co_empid" placeholder="Employee ID"><td>
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
                        <input type="submit" name="submit" value="create individual customer" class="btn btn-primary">
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
        $co_name = $_POST['co_name'];
        $co_regisno = $_POST['co_regisno'];
        $co_empid = $_POST['co_empid'];
        $c_addline1 = $_POST['c_addline1'];
        $c_addline2 = $_POST['c_addline2'];
        $c_zip = $_POST['c_zip'];
        $c_phone = $_POST['c_phone'];
        $c_email = $_POST['c_email'];
        $c_type = 'C';
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
        $SQL2 = "INSERT INTO mvx_corporate
                SET c_id = $c_id,
                    co_name = '$co_name',
                    co_regisno = $co_regisno,
                    co_empid = $co_empid
                ";
        
        //Execute SQL and save to database
        $RES2 = mysqli_query($CONN, $SQL2) or die(mysqli_error($db));

        //Check whether it has been inserted
        if($RES==TRUE && $RES2==TRUE) {
            //echo "Data inserted";
            $_SESSION['add'] = "Corporate added successfully.";

            header("location:".SITEURL);

        }
        else {
            //echo "Data insertion failed";
            $_SESSION['add'] = "Failed to add corporate.";

            header("location:".SITEURL.'create_acc_c.php');
        }
    }

?>

<?php include('partials_front/footer.php')?>