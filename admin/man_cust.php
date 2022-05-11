<?php include('partials/nav_bar.php'); ?>

        <div class="man_admin">
            <div class="container">
                <h1>Manage Customer</h1>
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

                <br/><br/>
                <a href="cust_add_i.php" class="button button-primary">Add Individual Customer</a>
                <br/><br/><br/>

                <h2>Individual Customers</h2>
                <table class="table-full">
                    <tr>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>License</th>
                        <th>Insurnace</th>
                        <th>Insurnace No</th>
                        <th>Address Line 1</th>
                        <th>Address Line 2</th>
                        <th>Zip</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query mvx_customer
                        $SQL = "SELECT *
                                FROM mvx_customer
                                WHERE c_type = 'I'";
                        
                        //Execute query
                        $RES = mysqli_query($CONN, $SQL);
                
                        //If execution success
                        if($RES==TRUE) {
                            $COUNT = mysqli_num_rows($RES);

                            $SN=1;

                            if($COUNT > 0) {
                                while($ROWS = mysqli_fetch_assoc($RES)) {
                                    //While loop to get all the data from customer table
                                    // variable = column names
                                    $c_id = $ROWS['c_id'];
                                    $c_addline1 = $ROWS['c_addline1'];
                                    $c_addline2 = $ROWS['c_addline2'];
                                    $c_zip = $ROWS['c_zip'];
                                    $c_phone = $ROWS['c_phone'];
                                    $c_email = $ROWS['c_email'];
                                    $c_type = $ROWS['c_type'];
                                    
                                    //Get all data from individual table based on c_id
                                    $SQL2 = "SELECT *
                                             FROM mvx_individual
                                             WHERE c_id = $c_id";
                                    $RES2 = mysqli_query($CONN, $SQL2);
                                    $ROWS2 = mysqli_fetch_assoc($RES2);

                                    $in_fname = $ROWS2['in_fname'];
                                    $in_lname = $ROWS2['in_lname'];
                                    $in_licenseno = $ROWS2['in_licenseno'];
                                    $in_insurname = $ROWS2['in_insurname'];
                                    $in_insurno = $ROWS2['in_insurno'];

                                    //Display values
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $c_id; ?></td>
                                        <td><?php echo $in_fname; ?></td>
                                        <td><?php echo $in_lname; ?></td>
                                        <td><?php echo $in_licenseno; ?></td>
                                        <td><?php echo $in_insurname; ?></td>
                                        <td><?php echo $in_insurno; ?></td>
                                        <td><?php echo $c_addline1; ?></td>
                                        <td><?php echo $c_addline2; ?></td>
                                        <td><?php echo $c_zip; ?></td>
                                        <td><?php echo $c_phone; ?></td>
                                        <td><?php echo $c_email; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/cust_update_i.php?c_id=<?php echo $c_id;?>" class="button button-secondary">Update Customer</a>
                                            <a href="<?php echo SITEURL;?>admin/cust_update_pw.php?c_id=<?php echo $c_id;?>" class="button button-secondary">Change Password</a>
                                            <a href="<?php echo SITEURL;?>admin/cust_delete.php?c_id=<?php echo $c_id;?>&c_type=<?php echo $c_type; ?>" class="button button-secondary">Delete Customer</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }

                        }
                    ?>
                </table>

                <br><br>

                <br/><br/>
                <a href="cust_add_c.php" class="button button-primary">Add Corporate Customer</a>
                <br/><br/><br/>

                <h2>Corporate Customers</h2>
                <table class="table-full">
                    <tr>
                        <th>Customer ID</th>
                        <th>Corporate Name</th>
                        <th>Registration</th>
                        <th>Employee ID</th>
                        <th>Address Line 1</th>
                        <th>Address Line 2</th>
                        <th>Zip</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query mvx_customer
                        $SQL3 = "SELECT *
                                FROM mvx_customer
                                WHERE c_type = 'C'";
                        
                        //Execute query
                        $RES3 = mysqli_query($CONN, $SQL3);
                
                        //If execution success
                        if($RES3==TRUE) {
                            $COUNT = mysqli_num_rows($RES3);

                            if($COUNT > 0) {
                                while($ROWS3 = mysqli_fetch_assoc($RES3)) {
                                    //While loop to get all the data from customer table
                                    // variable = column names
                                    $c_id = $ROWS3['c_id'];
                                    $c_addline1 = $ROWS3['c_addline1'];
                                    $c_addline2 = $ROWS3['c_addline2'];
                                    $c_zip = $ROWS3['c_zip'];
                                    $c_phone = $ROWS3['c_phone'];
                                    $c_email = $ROWS3['c_email'];
                                    $c_type = $ROWS3['c_type'];
                                    
                                    //Get all data from corporate table based on c_id
                                    $SQL4 = "SELECT *
                                             FROM mvx_corporate
                                             WHERE c_id = $c_id";
                                    $RES4 = mysqli_query($CONN, $SQL4);
                                    $ROWS4 = mysqli_fetch_assoc($RES4);

                                    $co_name = $ROWS4['co_name'];
                                    $co_regisno = $ROWS4['co_regisno'];
                                    $co_empid = $ROWS4['co_empid'];

                                    //Display values
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $c_id; ?></td>
                                        <td><?php echo $co_name; ?></td>
                                        <td><?php echo $co_regisno; ?></td>
                                        <td><?php echo $co_empid; ?></td>
                                        <td><?php echo $c_addline1; ?></td>
                                        <td><?php echo $c_addline2; ?></td>
                                        <td><?php echo $c_zip; ?></td>
                                        <td><?php echo $c_phone; ?></td>
                                        <td><?php echo $c_email; ?></td>
                                        <td>
                                        <a href="<?php echo SITEURL;?>admin/cust_update_c.php?c_id=<?php echo $c_id;?>" class="button button-secondary">Update Customer</a>
                                        <a href="<?php echo SITEURL;?>admin/cust_update_pw.php?c_id=<?php echo $c_id;?>" class="button button-secondary">Change Password</a>
                                        <a href="<?php echo SITEURL;?>admin/cust_delete.php?c_id=<?php echo $c_id;?>&c_type=<?php echo $c_type; ?>" class="button button-secondary">Delete Customer</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                    ?>
                </table>
            </div>
        </div>


<?php include('partials/footer.php'); ?>