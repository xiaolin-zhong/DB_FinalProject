<?php include('partials/nav_bar.php'); ?>

    <!-- Vehicles Available -->
        <div class="man_admin">
            <div class="container">
                <h1>Manage Admin</h1>
                <br/>

                <a href="add_admin.php" class="button button-primary">Add Admin</a>
                <br/><br/>

                <table class="table-full">
                    <tr>
                        <th>Agent ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //Query the admins
                        $SQL = "SELECT *
                                FROM mvx_admin";
                        
                        //Execute the query
                        $RES = mysqli_query($CONN, $SQL);

                        if($RES) {
                            $rows = mysqli_num_rows($RES);
                        }
                    ?>

                    <tr>
                        <td>1</td>
                        <td>Xiao Lin Zhong</td>
                        <td>xz3343</td>
                        <td>
                            <a href="#" class="button button-secondary">Update Admin</a>
                            <a href="#" class="button button-secondary">Delete Admin</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Vijay Kumar Chandrasekaran</td>
                        <td>vc2124</td>
                        <td>
                            <a href="#" class="button button-secondary">Update Admin</a>
                            <a href="#" class="button button-secondary">Delete Admin</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mahesh K Aithal</td>
                        <td>mka7840</td>
                        <td>
                            <a href="#" class="button button-secondary">Update Admin</a>
                            <a href="#" class="button button-secondary">Delete Admin</a>
                        </td>
                    </tr>
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