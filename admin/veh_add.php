<?php include('partials/nav_bar.php'); ?>

<div class="admin_add">
    <div class="container">
        <h1>Add Vehicle</h1>

        <?php
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data"> 
            <table class="table-40">

            <br/><br/>
                <tr>
                    <td>Vin Number</td>
                    <td><input type="text" name="v_vin" placeholder="Vin Number"><td>
                </tr>
                <tr>
                    <td>Make</td>
                    <td><input type="text" name="v_make" placeholder="Make"><td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><input type="text" name="v_model" placeholder="Model"><td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><input type="number" name="v_year" placeholder="Year"><td>
                </tr>
                <tr>
                    <td>License Plate</td>
                    <td><input type="text" name="v_licensepl" placeholder="License Plate"><td>
                </tr>
                <tr>
                    <td>Rent Rate</td>
                    <td><input type="number" name="v_rentrate" placeholder="Rent Rate"><td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>
                        <select name="vc_class">

                            <?php
                                //Display vehicle classes from database.
                                $SQL = "SELECT *
                                        FROM mvx_vclass";

                                $RES = mysqli_query($CONN, $SQL);

                                $COUNT = mysqli_num_rows($RES);

                                if($COUNT>0) {
                                    //While loop to get the class values
                                    while($ROW = mysqli_fetch_assoc($RES)) {
                                        $vc_id = $ROW['vc_id'];
                                        $vc_class = $ROW['vc_class'];
                                        ?>
                                        
                                        <option value="<?php echo $vc_id;?>"><?php echo $vc_class;?></option>

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
                    </td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td><input type="file" name="image"><td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add vehicle" class="button button-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php

            if(isset($_POST['submit'])) {
                //Get the data from form
                $v_vin = $_POST['v_vin'];
                $v_make = $_POST['v_make'];
                $v_model = $_POST['v_model'];
                $v_year = $_POST['v_year'];
                $v_licensepl = $_POST['v_licensepl'];
                $v_rentrate = $_POST['v_rentrate'];
                //$vc_class = $_POST['vc_class'];

                //Upload the image
                //Check if Choose File has been clicked on
                if(isset($_FILES['image']['name'])) {
                    $v_image = $_FILES['image']['name'];
                    
                    //Check if an image has been uploaded
                    if($v_image != "") {
                        //Rename image (.JPG, .PNG, GIF)
                        $EXT = explode('.', $v_image);
                        $EXT = end($EXT);
                        $v_image = "Vehicle_".rand(0000,9999).".".$EXT;
                        //Source path
                        $SRC = $_FILES['image']['tmp_name'];

                        //Destination
                        $DST = "../images/vehicles/".$v_image;
                        
                        //Upload
                        $UPLOAD = move_uploaded_file($SRC, $DST);

                        if($UPLOAD == FALSE) {
                            $_SESSION['upload'] = "Failed to upload image.";
                            header('location:'.SITEURL.'admin/veh_add.php');
                            //If upload failed, we want the entire process to die.
                            die();
                        }
                    }
                    
                }
                else {
                    $v_image = "";
                }

                //Insert the data into the database
                $SQL2 = "INSERT INTO mvx_vehicle SET
                         v_vin = '$v_vin',
                         v_make = '$v_make',
                         v_model = '$v_model',
                         v_year = $v_year,
                         v_licensepl = '$v_licensepl',
                         v_rentrate = $v_rentrate,
                         v_image = '$v_image'";

                $RES2 = mysqli_query($CONN, $SQL2);
                
                //Redirect to manage vehicle page
                if($RES2==TRUE) {
                        $_SESSION['add'] = "Vehicle was successfully added.";
                        header('location:'.SITEURL.'admin/man_veh.php');
                }
                else {
                    $_SESSION['add'] = "Failed to add vehicle.";
                        header('location:'.SITEURL.'admin/man_veh.php');
                }

            }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>