<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php
    // Perform database query
    $query  = "SELECT * ";
    $query .= "FROM people ";
    $query .= "ORDER BY last_name ASC";
    $result = mysqli_query($connection, $query);
    // Test if there was a query error
    if (!$result) {
        die("Database query failed.");
    }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phone Book</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "insert.php";
    var fn = document.getElementById("first_name").value;
    var ln = document.getElementById("last_name").value;
    var ph = document.getElementById("phone").value;
    var vars = "first_name="+fn+"&last_name="+ln+"&phone="+ph;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
</script>
<script>
$(document).ready(function() 
    { 
        $("#tablelist").tablesorter(); 
    } 
); 
</script>


<script type="text/javascript" src="json_script.js"></script>



<script src="//use.typekit.net/opt0waa.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<style>
body{
    font-family:futura-pt;
}
</style>
</head>
<body>

    <div class="container-fluid">
    <h1>Phone Book</h1>



<form id="myForm">
<p>First Name: <input id="first_name" name="first_name" type="text" required /></p>
<p>Last Name: <input id="last_name" name="last_name" type="text" required /></p>
<p>Phone Number: <input id="phone" name="phone" type="text" required></p>
<input id="sub" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>
</form>

            <div id="status"></div>

<div id="listing">
   <!--         <?php
            // Use returned data
           // while($subject = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>
    -->
    <div class="table-responsive">
    <table id="tablelist" class="table table-striped table-hover tablesorter">
        <thead>
        <tr>
       <!-- <th>ID
            </th>   -->
            <th>Last Name
            </th>
            <th>First Name
            </th>
            <th>Phone Number
            </th>
        </tr>
        </thead>
        <tbody>
            <?php
        while($subject = mysqli_fetch_assoc($result)) {
echo "<tr>";

                echo "<td>" , $subject["last_name"] , "</td>";
                echo "<td>" , $subject["first_name"] , "</td>";
                echo "<td>" , $subject["phone"] , "</td>";
                echo "<td style='text-align:center;'>";
  

                    //delete button
                    echo "<div class='deleteBtn customBtn'><a href='delete.php?del=$subject[id]'><button class='btn btn-default' type='submit'>Delete</button></a></div>";
                echo "</td>";
            echo "</tr>";
        }
            ?>
            <tr>
                <td>Queen</td>
                <td>Oliver</td>
                <td>777-888-9999</td>
                <td style='text-align:center;'><div class='deleteBtn customBtn'><button class='btn btn-default' type='submit'>Delete</button></div></td>
            </tr>
        </tbody>
    </table>
    </div><!-- Boot table -->
</div><!-- listing -->

</div> <!-- Boot page container -->

<script src="js/bootstrap.min.js"></script>

</body>
</html>