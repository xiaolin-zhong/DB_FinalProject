<?php include('partials/nav_bar.php'); ?>

<div class="rent_add">
    <div class="container">
        <h1>Add Rental</h1>


        <form action="" method="POST"> 
            <table class="table-40">
            
            <br/><br/>
                <tr>
                    <td>Pick Up Location</td>
                    <td><input type="text" name="r_pickuploc" placeholder="Pick Up Location"><td>
                </tr>
                <tr>
                    <td>Drop Off Location</td>
                    <td><input type="text" name="r_droploc" placeholder="Drop Off Location"><td>
                </tr>
                <tr>
                    <td>Pick Up Date</td>
                    <td><input type="date" name="r_pickupdate" placeholder="Pick Up Date"><td>
                </tr>
                <tr>
                    <td>Drop Off Date</td>
                    <td><input type="date" name="r_dropdate" placeholder="Drop Off Date"><td>
                </tr>
                <tr>
                    <td>Start Odometer</td>
                    <td><input type="number" name="r_startodo" placeholder="Start Odometer"><td>
                </tr>
                <tr>
                    <td>End Odometer</td>
                    <td><input type="number" name="r_endodo" placeholder="End Odometer"><td>
                </tr>
                <tr>
                    <td>Limit Odometer</td>
                    <td><input type="number" name="r_limitodo" placeholder="Limit Odometer"><td>
                </tr>

                <tr>
                    <td>Customer</td>
                    <td>
                        <select name="c_id">

                            <?php
                                //Display vehicle classes from database.
                                $SQL = "SELECT *
                                        FROM mvx_customer";

                                $RES = mysqli_query($CONN, $SQL);

                                $COUNT = mysqli_num_rows($RES);

                                if($COUNT>0) {
                                    //While loop to get the class values
                                    while($ROW = mysqli_fetch_assoc($RES)) {
                                        $c_id = $ROW['c_id'];
                                        $c_email = $ROW['c_email'];
                                        ?>
                                        
                                        <option value="<?php echo $c_id;?>"><?php echo "ID: "; echo $c_id; echo "  "; echo "email: ";echo $c_email;?></option>

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
                        <input type="submit" name="submit" value="create rent" class="button button-secondary">
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
        ob_start();
        //Get data from the form
        $r_pickuploc = $_POST['r_pickuploc'];
        $r_droploc = $_POST['r_droploc'];
        $r_pickupdate = $_POST['r_pickupdate'];
        $r_dropdate = $_POST['r_dropdate'];
        $r_startodo = $_POST['r_startodo'];
        $r_endodo = $_POST['r_endodo'];
        $r_limitodo = $_POST['r_limitodo'];
        $r_pickupdate = date('Y-m-d', strtotime($r_pickupdate));
        $r_dropdate = date('Y-m-d', strtotime($r_dropdate));
        $c_id = $_POST['c_id'];

        //SQL query from the form
        //SET column name = form name
        $SQL = "INSERT INTO mvx_rent
                SET r_pickuploc = '$r_pickuploc',
                    r_droploc = '$r_droploc',
                    r_pickupdate = '$r_pickupdate',
                    r_dropdate = '$r_dropdate',
                    r_startodo = $r_startodo,
                    r_endodo = '$r_endodo',
                    r_limitodo = '$r_limitodo',
                    c_id = $c_id
                ";
        
        //Execute SQL and save to database
        $RES = mysqli_query($CONN, $SQL) or die(mysqli_error($db));

        //Check whether it has been inserted
        if($RES) {
            //echo "Data inserted";
            $_SESSION['add'] = "Rental added successfully.";

            header("location:".SITEURL.'admin/man_rent.php');

        }
        else {
            //echo "Data insertion failed";
            $_SESSION['add'] = "Rental failed to be added.";

            header("location:".SITEURL.'admin/add_rent.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>