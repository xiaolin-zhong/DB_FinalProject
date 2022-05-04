<?php include('partials/nav_bar.php'); ?>

<div class="add_admin">
    <div class="container">
        <h1>Add Admin</h1>

        <form action="" method="POST"> 
            <table class="table-40">

            <br/><br/>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="a_fname" placeholder="First Name"><td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="a_lname" placeholder="Last Name"><td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="a_username" placeholder="Username"><td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="a_password" placeholder="Password"><td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="create admin" class="button button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //Process the value from form and save to database.
    //Check whether the submit button is clicked or not.

    if(isset($_POST['submit'])) {
        //Button clicked
        echo "Admin created.";

        //Get data from the form
        $a_fname = $_POST['a_fname'];
        $a_lname = $_POST['a_lname'];
        $a_username = $_POST['a_username'];
        //Pass encryption with MD5
        $a_password = md5($_POST['a_password']);

        //SQL query from the form
        //SET column name = form name
        $SQL = "INSERT INTO mvx_admin
                SET a_fname = '$a_fname',
                    a_lname = '$a_lname',
                    a_username = '$a_username',
                    a_password = '$a_password'
                ";

        //Execute query and save into database
        //Database connection:
        $CONN= mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
        //Select database:
        $DB_SELECT = mysqli_select_db($CONN,'xz3343vc2124mka7840') or die(mysqli_error($db));
        
        $RES = mysqli_query($CONN, $SQL) or die(mysqli_error($db));
    }

?>