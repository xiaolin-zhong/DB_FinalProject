<?php include('partials/nav_bar.php'); ?>

    <!-- Vehicles Available -->
        <div class="man_admin">
            <div class="container">
                <h1>Manage Admin</h1>
                <br/>

                <?php
                    if(isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                    }
                    
                    if(isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['currpw_not_match'])) {
                        echo $_SESSION['currpw_not_match'];
                        unset($_SESSION['currpw_not_match']);
                    }

                    if(isset($_SESSION['newconf_not_match'])) {
                        echo $_SESSION['newconf_not_match'];
                        unset($_SESSION['newconf_not_match']);
                    }

                    if(isset($_SESSION['password_updated'])) {
                        echo $_SESSION['password_updated'];
                        unset($_SESSION['password_updated']);
                    }
                ?>
                <br/>
                <a href="admin_add.php" class="button button-primary">Add Admin</a>
                <br/><br/>

                <table class="table-full">
                    <tr>
                        <th>Agent ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query admin
                        $SQL = "SELECT *
                                FROM mvx_admin";
                        //Execute query
                        $RES = mysqli_query($CONN, $SQL);

                        //If execution success
                        if($RES==TRUE) {
                            $COUNT = mysqli_num_rows($RES);

                            $SN=1;

                            if($COUNT > 0) {
                                while($ROWS = mysqli_fetch_assoc($RES)) {
                                    //While loop to get all the data from database
                                    // variable = column names
                                    $a_id = $ROWS['a_id'];
                                    $a_fname = $ROWS['a_fname'];
                                    $a_lname = $ROWS['a_lname'];
                                    $a_username = $ROWS['a_username'];

                                    //Display values
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $SN++; ?></td>
                                        <!-- <td><?php echo $a_id; ?></td> -->
                                        <td><?php echo $a_fname; ?></td>
                                        <td><?php echo $a_lname; ?></td>
                                        <td><?php echo $a_username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/admin_update.php?a_id=<?php echo $a_id;?>" class="button button-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>admin/admin_update_pw.php?a_id=<?php echo $a_id;?>" class="button button-secondary">Change Password</a>
                                            <a href="<?php echo SITEURL;?>admin/admin_delete.php?a_id=<?php echo $a_id;?>" class="button button-secondary">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }

                        }
                    ?>
                </table>
                <?php 
                    // If session successful, show success message.
                    if(isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                ?>
            </div>
        </div>
 <?php include('partials/footer.php'); ?>