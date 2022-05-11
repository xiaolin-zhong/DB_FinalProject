<?php include('partials/nav_bar.php'); ?>

<div class="vehicle_update">
    <div class="container">
        <h1>Update Vehicle</h1>

        <?php

            //Get the a_id of the admin we are deleting
            $v_vin = $_GET['v_vin'];

            // SQL query to delete admin
            $SQL = "SELECT *
                    FROM mvx_vehicle
                    WHERE v_vin = '$v_vin'";

            // Execute the query
            $RES = mysqli_query($CONN, $SQL);

            // Actions after the query
            if($RES==TRUE) {
                //echo "Admin deleted"
                $COUNT = mysqli_num_rows($RES);

                if ($COUNT==1) {
                    $ROW = mysqli_fetch_assoc($RES);

                    $v_vin = $ROW['v_vin'];
                    $v_make = $ROW['v_make'];
                    $v_model = $ROW['v_model'];
                    $v_year = $ROW['v_year'];
                    $v_licensepl = $ROW['v_licensepl'];
                    $v_rentrate = $ROW['v_rentrate'];
                    $v_currimage = $ROW['v_image'];
                }
                else {
                    header('location:'.SITEURL.'admin/man_admin.php');
                }
            }

        ?>

        <form action="" method="POST" enctype="multipart/form-data"> 
            <table class="table-40">

            <br/><br/>
                <tr>
                    <td>Vin Number</td>
                    <td><input type="text" name="v_vin" value="<?php echo $v_vin;?>"><td>
                </tr>
                <tr>
                    <td>Make</td>
                    <td><input type="text" name="v_make" value="<?php echo $v_make;?>"><td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><input type="text" name="v_model" value="<?php echo $v_model;?>"><td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><input type="number" name="v_year" value="<?php echo $v_year;?>"><td>
                </tr>
                <tr>
                    <td>License</td>
                    <td><input type="text" name="v_licensepl" value="<?php echo $v_licensepl;?>"><td>
                </tr>
                <tr>
                    <td>Rental Rate</td>
                    <td><input type="number" name="v_rentrate" value="<?php echo $v_rentrate;?>"><td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                            if($v_currimage==""){
                                echo "Image not available.";
                            }
                            else {
                                ?>

                                <img src="<?php echo SITEURL;?>images/vehicles/<?php echo $v_currimage;?>" width = 100px>

                                <?php
                            }
                        ?>
                    <td>
                </tr>
                <tr>
                    <td>Select New Image</td>
                    <td><input type="file" name="image"><td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type ="hidden" name="v_vin" value="<?php echo $v_vin; ?>">
                        <input type= "hidden" name="v_image" value="<?php echo $v_image; ?>">
                        <input type="submit" name="submit" value="update vehicle" class="button button-secondary">
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
        $v_vin = $_POST['v_vin'];
        $v_make = $_POST['v_make'];
        $v_model = $_POST['v_model'];
        $v_year = $_POST['v_year'];
        $v_licensepl = $_POST['v_licensepl'];
        $v_rentrate = $_POST['v_rentrate'];
        $v_currimage = $_POST['v_image'];

        
        if(isset($_FILES['image']['name'])) {
            //if new image is uploaded.
            $v_image = $_FILES['image']['name'];
            //Check if the file is available
            if($v_image!="") {
                $EXT = explode('.', $v_image);
                $EXT = end($EXT);
                $v_image = "Vehicle_".rand(0000,9999).".".$EXT;
                $SRC = $_FILES['image']['tmp_name'];

                //Destination
                $DST = "../images/vehicles/".$v_image;
                $UPLOAD = move_uploaded_file($SRC, $DST);

                if($UPLOAD == FALSE) {
                    $_SESSION['upload'] = "Failed to upload image.";
                    header('location:'.SITEURL.'admin/veh_add.php');
                    //If upload failed, we want the entire process to die.
                    die();
                }

                if ($v_currimage!="") {
                    $REMOVE_PATH = "../images/vehicles/".$v_image;

                    $REMOVE = unlink($REMOVE_PATH);

                    if($REMOVE==FALSE) {
                        $_SESSION['remove_failed'] = "Failed to remove current image.";
                        header('location:'.SITEURL.'admin/man_veh.php');
                        die();
                    }
                }
            }
        }
        else {
            //if not new image uploaded.
            $v_image = $v_currimage;
        }

        //SQL query to update vehicle
        $SQL2 = "UPDATE mvx_vehicle
                SET v_make = '$v_make',
                    v_model = '$v_model',
                    v_year = $v_year,
                    v_licensepl = '$v_licensepl',
                    v_rentrate = $v_rentrate,
                    v_image = '$v_image'
                WHERE v_vin = '$v_vin'";
        
        $RES2 = mysqli_query($CONN,$SQL2);

        //Check the query if executed successfully
        if($RES2==TRUE) {
            $_SESSION['update'] = "Vehicle updated successfully.";
            header('location:'.SITEURL.'admin/man_veh.php');
        }
        else {
            $_SESSION['update'] = "Vehicle failed to update.";
            header('location:'.SITEURL.'admin/man_veh.php');
        }
        
    }
?>

<?php include('partials/footer.php'); ?>