<?php include('partials_front/nav_bar.php');?>

    <?php   
        //Check for v_vin set
        if(isset($_GET['v_vin'])) {
            //Get v_vin
            $v_vin = $_GET['v_vin'];

            //Get the details of the vehicle based on the v_vin
            $SQL = "SELECT *
                    FROM mvx_vehicle
                    WHERE v_vin = '$v_vin'";
            
            $RES = mysqli_query($CONN, $SQL);

            $COUNT = mysqli_num_rows($RES);

            if($COUNT==1) {
                $ROW = mysqli_fetch_assoc($RES);
                $v_make = $ROW['v_make'];
                $v_model = $ROW['v_model'];
                $v_year = $ROW['v_year'];
                $v_rentrate = $ROW['v_rentrate'];
                $v_image = $ROW['v_image'];
            }
        }
        else {
            header('location:'.SITEURL);
        }

        //Get the info on the user logged in
        $c_email = $_SESSION['cust_login'];
        $c_type = $_SESSION['cust_type'];
        
        $SQL2 = "SELECT *
                 FROM mvx_customer
                 WHERE c_email = '$c_email'";
        $RES2 = mysqli_query($CONN, $SQL2);
        $ROW2 = mysqli_fetch_assoc($RES2);
        
        $c_id = $ROW2['c_id'];
        $c_addline1 = $ROW2['c_addline1'];
        $c_addline2 = $ROW2['c_addline2'];
        $c_zip = $ROW2['c_zip'];
        $c_phone = $ROW2['c_phone'];
        $c_email = $ROW2['c_email'];
        
        $SQL3 = "SELECT *
                 FROM mvx_corporate
                 WHERE c_id = $c_id";
        $RES3 = mysqli_query($CONN, $SQL3);
        $ROW3 = mysqli_fetch_assoc($RES3);

        $co_name = $ROW3['co_name'];
        $co_regisno = $ROW3['co_regisno'];
        $co_empid = $ROW3['co_empid'];       

    ?>

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
                <fieldset>
                    <h1 class="text-center">Selected Vehicle</h1>

                    <div class="food-menu-img">
                    <img src="<?php echo SITEURL;?>../images/vehicles/<?php echo $v_image;?>" alt="Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $v_make; echo ' '; echo $v_model; echo ' '; echo $v_year;?></h3>
                        <input type ="hidden" name ="v_make" value="<?php echo $v_make;?>">
                        <input type ="hidden" name ="v_model" value="<?php echo $v_model;?>">

                        <p class="food-price">Price Per Day: $<?php echo $v_rentrate; ?></p>
                        <input type ="hidden" name ="v_rentrate" value="<?php echo $v_rentrate;?>">

                    </div>

                </fieldset>
                
                <fieldset>
                    <p class="food-price">Your Info</p>
                    <br>
                    <div class="order-label">Company Name</div>
                    <input type="text" name="co_name" value="<?php echo $co_name;?>" class="input-responsive" required>
                    
                    <div class="order-label">Company Registration</div>
                    <input type="text" name="co_regisno" value="<?php echo $co_regisno;?>" class="input-responsive" required>
                    
                    <div class="order-label">Employee ID</div>
                    <input type="text" name="co_empid" value="<?php echo $co_empid;?>" class="input-responsive" required>

                    <div class="order-label">Address Line 1</div>
                    <input type="text" name="c_addline1" value="<?php echo $c_addline1;?>" class="input-responsive" required>

                    <div class="order-label">Address Line 2</div>
                    <input type="text" name="c_addline1" value="<?php echo $c_addline2;?>" class="input-responsive">

                    <div class="order-label">Zip Code</div>
                    <input type="text" name="c_addline1" value="<?php echo $c_zip;?>" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="text" name="c_phone" value="<?php echo $c_phone;?>" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="text" name="c_email" value="<?php echo $c_email;?>" class="input-responsive" required>
                    <br>
                    <p class="food-price">Order Details</p>
                    <br>
                    <div class="order-label">Pick Up Location</div>
                    <select name="l_addline2">

                            <?php
                                //Display vehicle classes from database.
                                $SQL4 = "SELECT *
                                        FROM mvx_location";

                                $RES4 = mysqli_query($CONN, $SQL4);

                                $COUNT4 = mysqli_num_rows($RES4);

                                if($COUNT4>0) {
                                    //While loop to get the class values
                                    while($ROW4 = mysqli_fetch_assoc($RES4)) {
                                        $l_id = $ROW4['l_id'];
                                        $l_addline1 = $ROW4['l_addline1'];
                                        $l_addline2 = $ROW4['l_addline2'];
                                        ?>
                                        
                                        <option value="<?php echo $l_id;?>" ><?php echo $l_addline1; echo " "; echo $l_addline2;?></option>

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

                    <div class="order-label">Start Date</div>
                    <input type="date" name="r_pickupdate" placeholder="Pick Up Date" class="input-responsive" required>

                    <div class="order-label">End Date</div>
                    <input type="date" name="r_dropdate" placeholder="Drop Off Date" class="input-responsive" required>
                    <br>
                    <p class="food-price">Payment Details</p>
                    <br>
                    <div class="order-label">Payment Method</div>
                    <input type="text" name="p_method" placeholder="Payment Method" class="input-responsive" required>

                    <div class="order-label">Card No.</div>
                    <input type="text" name="p_cardno" placeholder="Card Number" class="input-responsive" required>

                    <div class="order-label">Discount No.</div>
                    <input type="number" name="d_id" placeholder="Discount Number" class="input-responsive">

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
                if(isset($_POST['submit'])) {
                    $v_make = $_POST['v_make'];
                    $v_model = $_POST['v_model'];
                    $v_rentrate = $_POST['v_rentrate'];
                    $r_pickuploc = $_POST['l_addline2'];
                    $r_pickupdate = $_POST['r_pickupdate'];
                    $r_dropdate = $_POST['r_dropdate'];
                    date_default_timezone_get();
                    $p_date = date('Y-m-d');
                    $p_method = $_POST['p_method'];
                    $p_cardno = $_POST['p_cardno'];
                    $r_dropdate = $_POST['r_dropdate'];
                    $r_startodo = rand(00000,99999);
                    $r_limitodo = rand(000,999);
                    
                    $SQL_R = "INSERT INTO mvx_rent
                                SET r_pickuploc = '$r_pickuploc',
                                r_pickupdate = '$r_pickupdate',
                                r_dropdate = '$r_dropdate',
                                r_startodo = $r_startodo,
                                r_limitodo = $r_limitodo,
                                c_id = $c_id
                    ";
                    $RES_R = mysqli_query($CONN, $SQL_R);

                    $SQL_P = "INSERT INTO mvx_payment
                                SET p_date = '$p_date',
                                    p_method = '$p_method',
                                    p_cardno = '$p_cardno'
                    ";
                    $RES_P = mysqli_query($CONN, $SQL_P);

                    $cal_date = abs($r_dropdate - $r_pickupdate);
                    $cal_amount = $cal_date * $v_rentrate;

                    $SQL_I = "INSERT INTO mvx_invoice
                                SET i_date = '$p_date'
                                i_amount = $cal_amount
                    ";
                    $RES_I = mysqli_query($CONN, $SQL_I);

                    if($RES_R && $RES_P && $RES_I) {
                        //echo "Data inserted";
                        $_SESSION['rent'] = "Order successful.";
            
                        header("location:".SITEURL);
            
                    }
                    else {
                        //echo "Data insertion failed";
                        $_SESSION['rent'] = "Order failed.";
            
                        header("location:".SITEURL.'rent.php');
                    }             
                }
            ?>
            

        </div>
    </section>

<?php include('partials_front/footer.php')?>