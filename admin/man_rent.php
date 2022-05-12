<?php include('partials/nav_bar.php'); ?>

<!-- Rental -->
    <div class="man_rent">
            <div class="container">
                <h1>Manage Rentals</h1>
                
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

                <br/><br/>
                <a href="<?php echo SITEURL;?>admin/rent_add.php" class="button button-primary">Add Rental</a>
                <br/><br/>

                <table class="table-full">
                    <tr>
                        <th>Rent ID</th>
                        <th>Pick Up Location</th>
                        <th>Drop Off Location</th>
                        <th>Pick Up Date</th>
                        <th>Drop Off Date</th>
                        <th>Start Odometer</th>
                        <th>End Odometer</th>
                        <th>Limit Odometer</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    
                        //SQL query to get all the vehicles
                        $SQL = "SELECT *
                                FROM mvx_rent";

                        $RES = mysqli_query($CONN, $SQL);

                        $COUNT = mysqli_num_rows($RES);

                        if($COUNT>0) {
                            //Get the vehicle attributes from the table
                            while($ROW=mysqli_fetch_assoc($RES)) {
                                $r_id = $ROW['r_id'];
                                $r_pickuploc = $ROW['r_pickuploc'];
                                $r_droploc = $ROW['r_droploc'];
                                $r_pickupdate = $ROW['r_pickupdate'];
                                $r_dropdate = $ROW['r_dropdate'];
                                $r_startodo = $ROW['r_startodo'];
                                $r_endodo = $ROW['r_endodo'];
                                $r_limitodo = $ROW['r_limitodo'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $r_id;?></td>
                                    <td><?php echo $r_pickuploc;?></td>
                                    <td><?php echo $r_droploc;?></td>
                                    <td><?php echo $r_pickupdate;?></td>
                                    <td><?php echo $r_dropdate;?></td>
                                    <td><?php echo $r_startodo;?></td>
                                    <td><?php echo $r_endodo;?></td>
                                    <td><?php echo $r_limitodo;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/rent_update.php?r_id=<?php echo $r_id;?>" class="button button-secondary">Update Rental</a>
                                        <a href="<?php echo SITEURL;?>admin/rent_delete.php?r_id=<?php echo $r_id;?>" class="button button-secondary">Delete Rental</a>
                                    </td>
                                </tr>

                                <?php

                            }
                        }
                        else {
                            echo "<tr><td colspan='7'>No rentals added yet.</td></tr>";
                        }

                    ?>

                </table>
            </div>
    </div>

<?php include('partials/footer.php'); ?>