<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php
    // 2. Perform database query
    $query  = "SELECT * ";
    $query .= "FROM people ";
    $query .= "ORDER BY last_name ASC";
    $result = mysqli_query($connection, $query);
    // Test if there was a query error
    if (!$result) {
        die("Database query failed.");
    }
?>




<div id="update">
<p>First Name: <input id="first_name" name="first_name" type="text"></p>
<p>Last Name: <input id="last_name" name="last_name" type="text"></p>
<p>Phone Number <input id="phone" name="phone" type="text"></p>
<input name="myBtn" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>
</div>

<div id="status"></div>


<div id="listing">
            <?php
            // Use returned data
            while($subject = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Last Name
            </th>
            <th>First Name
            </th>
            <th>Phone Number
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $subject["last_name"]; ?>
            </td>
            <td><?php echo $subject["first_name"]; ?>
            </td>
            <td><?php echo $subject["phone"]; ?>
            </td>
            <?php
            }
        ?>
        </tr>
        </tbody>
    </table>
    </div><!-- Boot table -->
</div><!-- listing -->


</div> <!-- Boot page container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>