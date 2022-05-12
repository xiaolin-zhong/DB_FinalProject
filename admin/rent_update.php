<?php include('partials/nav_bar.php'); ?>

<div class="rent_update">
    <div class="container">
        <h1>Update Rental</h1>

        <?php
            // Get the r_id of the admin we are deleting
            $r_id = $_GET['r_id'];

            // SQL query to delete admin
            $SQL = "SELECT *
                    FROM mvx_rent
                    WHERE r_id = $r_id";

            // Execute the query
            $RES = mysqli_query($CONN, $SQL);

            // Actions after the query
            if($RES==TRUE) {
                //echo "Admin deleted"
                $COUNT = mysqli_num_rows($RES);

                if ($COUNT==1) {
                    $ROW = mysqli_fetch_assoc($RES);

                    $r_id = $ROW['r_id'];
                    $r_pickuploc = $ROW['r_pickuploc'];
                    $r_droploc = $ROW['r_droploc'];
                    $r_pickupdate = $ROW['r_pickupdate'];
                    $r_dropdate = $ROW['r_dropdate'];
                    $r_startodo = $ROW['r_startodo'];
                    $r_endodo = $ROW['r_endodo'];
                    $r_limitodo = $ROW['r_limitodo'];
                }
                else {
                    header('location:'.SITEURL.'admin/man_rent.php');
                }
            }

        ?>

        <form action="" method="POST"> 
            <table class="table-40">

            <br/><br/>
                <tr>
                    <td>Rent ID</td>
                    <td><input type="text" name="r_id" value="<?php echo $r_id;?>"><td>
                </tr>
                <tr>
                    <td>Pick Up Location</td>
                    <td><input type="text" name="r_pickuploc" value="<?php echo $r_pickuploc;?>"><td>
                </tr>
                <tr>
                    <td>Drop Off Location</td>
                    <td><input type="text" name="r_droploc" value="<?php echo $r_droploc;?>"><td>
                </tr>
                <tr>
                    <td>Pick Up Date</td>
                    <td><input type="date" name="r_pickupdate" value="<?php echo $r_pickupdate;?>"><td>
                </tr>
                <tr>
                    <td>Drop Off Date</td>
                    <td><input type="date" name="r_dropdate" value="<?php echo $r_dropdate;?>"><td>
                </tr>
                <tr>
                    <td>Start Odometer</td>
                    <td><input type="number" name="r_startodo" value="<?php echo $r_startodo;?>"><td>
                </tr>
                <tr>
                    <td>End Odometer</td>
                    <td><input type="number" name="r_endodo" value="<?php echo $r_endodo;?>"><td>
                </tr>
                <tr>
                    <td>Limit Odometer</td>
                    <td><input type="number" name="r_limitodo" value="<?php echo $r_limitodo;?>"><td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>
                        <select name="c_id">

                            <?php
                                ob_start();
                                //Display vehicle classes from database.
                                $SQL3 = "SELECT *
                                        FROM mvx_customer";

                                $RES3 = mysqli_query($CONN, $SQL3);

                                $COUNT3 = mysqli_num_rows($RES3);

                                if($COUNT3>0) {
                                    //While loop to get the class values
                                    while($ROW3 = mysqli_fetch_assoc($RES3)) {
                                        $c_id = $ROW3['c_id'];
                                        $c_email = $ROW3['c_email'];
                                        ?>
                                        
                                        <option value="<?php echo $c_id;?>">
                                            <?php echo $c_email;?>
                                        </option>

                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                    <option value="0">None</option>
                                    <?php
                                }
                            ?>
                        </select>
                    <td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type ="hidden" name="r_id" value="<?php echo $r_id; ?>">
                        <input type="submit" name="submit" value="update rental" class="button button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    ob_start();
    //Check whether update button is pressed on
    if(isset($_POST['submit'])) {
        //echo "Button Clicked";
        //Get values inputted from the form
        $r_id = $_POST['r_id'];
        $r_pickuploc = $_POST['r_pickuploc'];
        $r_droploc = $_POST['r_droploc'];
        $r_pickupdate = $_POST['r_pickupdate'];
        $r_dropdate = $_POST['r_dropdate'];
        $r_startodo = $_POST['r_startodo'];
        $r_endodo = $_POST['r_endodo'];
        $r_limitodo = $_POST['r_limitodo'];
        $c_id = $_POST['c_id'];

        //SQL query to update rental
        $SQL2 = "UPDATE mvx_rent
                SET r_pickuploc = '$r_pickuploc',
                    r_droploc = '$r_droploc',
                    r_pickupdate = '$r_pickupdate',
                    r_dropdate = '$r_dropdate',
                    r_startodo = $r_startodo,
                    r_endodo = '$r_endodo',
                    r_limitodo = '$r_limitodo',
                    c_id = $c_id
                WHERE r_id = $r_id";
        
        $RES2 = mysqli_query($CONN,$SQL2);

        //Check the query if executed successfully
        if($RES2==TRUE) {
            $_SESSION['update'] = "Rental updated successfully.";
            header('location:'.SITEURL.'admin/man_rent.php');
        }
        else {
            $_SESSION['update'] = "Rental failed to update.";
            header('location:'.SITEURL.'admin/man_rent.php');
        }
        
    }
?>

<?php include('partials/footer.php'); ?>