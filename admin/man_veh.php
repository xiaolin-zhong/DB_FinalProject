<?php include('partials/nav_bar.php'); ?>

    <!-- Vehicles -->
        <div class="man_veh">
            <div class="container">
                <h1>Manage Vehicles</h1>

                <br/><br/>
                <a href="<?php echo SITEURL;?>admin/veh_add.php" class="button button-primary">Add Vehicle</a>
                <br/><br/>

                <?php 
                    if(isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload'])) {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                ?>

                <table class="table-full">
                    <tr>
                        <th>Vin Number</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>License</th>
                        <th>Rental Rate</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    
                        //SQL query to get all the vehicles
                        $SQL = "SELECT *
                                FROM mvx_vehicle";

                        $RES = mysqli_query($CONN, $SQL);

                        $COUNT = mysqli_num_rows($RES);

                        if($COUNT>0) {
                            //Get the vehicle attributes from the table
                            while($ROW=mysqli_fetch_assoc($RES)) {
                                $v_vin = $ROW['v_vin'];
                                $v_make = $ROW['v_make'];
                                $v_model = $ROW['v_model'];
                                $v_year = $ROW['v_year'];
                                $v_licensepl = $ROW['v_licensepl'];
                                $v_rentrate = $ROW['v_rentrate'];
                                $v_image = $ROW['v_image'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $v_vin;?></td>
                                    <td><?php echo $v_make;?></td>
                                    <td><?php echo $v_model;?></td>
                                    <td><?php echo $v_year;?></td>
                                    <td><?php echo $v_licensepl;?></td>
                                    <td><?php echo $v_rentrate;?></td>
                                    <td>
                                        <?php
                                            if($v_image=="") {
                                                echo "Image not added.";
                                            }
                                            else {
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/vehicles/<?php echo $v_image;?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/veh_update.php?v_vin=<?php echo $v_vin;?>" class="button button-secondary">Update Vehicle</a>
                                        <a href="<?php echo SITEURL;?>admin/veh_delete.php?v_vin=<?php echo $v_vin;?>&v_image=<?php echo $v_image; ?>" class="button button-secondary">Delete Vehicle</a>
                                    </td>
                                </tr>

                                <?php

                            }
                        }
                        else {
                            echo "<tr><td colspan='7'>No vehicles added yet.</td></tr>";
                        }

                    ?>

                </table>

            </div>
        </div>

<?php include('partials/footer.php'); ?>