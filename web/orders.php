<?php include('partials_front/nav_bar.php');?>

<div class="man_rent">
    <div class="container">
        <h1>Orders</h1>
        <table class="table-full">
            <br/><br/>
            <tr>
                <th>Rent ID</th>
                <th>Pick Up Location</th>
                <th>Drop Off Location</th>
                <th>Pick Up Date</th>
                <th>Drop Off Date</th>
                <th>Start Odometer</th>
                <th>End Odometer</th>
                <th>Limit Odometer</th>
                <th>Invoice Amount</th>
            </tr>

            <?php
                $c_email = $_SESSION['cust_login'];

                $SQL2 = "SELECT *
                         FROM mvx_customer
                         WHERE c_email = '$c_email'";
                $RES2 = mysqli_query($CONN, $SQL2);
                $ROW2 = mysqli_fetch_assoc($RES2);
                $c_id = $ROW2['c_id'];

                //SQL query to get all the vehicles
                $SQL = "SELECT *
                        FROM mvx_rent
                        WHERE c_id = $c_id";

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
                        $date1 = strtotime($r_dropdate);
                        $date2 = strtotime($r_pickupdate);
                        $cal_date = round(($date1 - $date2)/(60*60*24));
                        $cal_odo = $r_endodo - $r_startodo;
                        if ($r_limitodo>0) {
                            if ($cal_odo > $r_limitodo) {
                                $cal_diff = $cal_odo - $r_limitodo;
                                $cal_amount = ($cal_date * 50) + ($cal_diff * 2.5);
                            }
                            else {
                                $cal_amount = $cal_date * 50;
                            }
                        }
                        else {
                            $cal_amount = $cal_date * 50;
                        }

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
                            <td>$<?php echo $cal_amount;?>.00</td>
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


<?php include('partials_front/footer.php')?>