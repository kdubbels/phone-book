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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">

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
    background-image: url(css/bg.jpg);
}
</style>
</head>
<body>

    <div class="container">

    <h1 class="text-center">My Sweet Phone Book App</h1>

<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

<form id="myForm">
    <div class="form-group">
<label for="first">First Name: </label><input id="first_name" class="form-control" name="first_name" type="text" placeholder="First Name" autofocus required /></p>
    </div>
    <div class="form-group">
<label for="last">Last Name: </label><input id="last_name" class="form-control" name="last_name" type="text" placeholder="Last Name" required /></p>
    </div>
    <div class="form-group">
<label for="num">Phone: </label><input id="phone" class="form-control" name="phone" type="text" placeholder="Phone" required pattern="[2-9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="North American format: XXX-XXX-XXXX"></p>
    </div>
<input id="sub" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>
</form>

</div><!-- cols -->
</div><!-- row -->

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<p>Colums can be alphabetized ascending or descending by clicking on their headers.</p>


<div id="listing">

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
            <th>Remove
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
                echo "<td>";
  

                    //delete button
                    echo "<div class='deleteBtn customBtn'><a href='delete.php?del=$subject[id]'><button class='btn btn-default' type='submit'>Delete</button></a></div>";
                echo "</td>";
            echo "</tr>";
        }
            ?>
            
        </tbody>
    </table>
    </div><!-- Boot table -->
</div><!-- listing -->

</div><!-- cols -->
</div><!-- row -->

</div> <!-- Boot page container -->

<footer class="colophon">

<div class="container-fluid">
        <div class="row">
         
<div class= "col-sm-4 col-sm-push-4  col-sm-offset-2 col-md-push-4 col-md-4 col-md-offset-2 col-lg-push-4 col-lg-4 col-lg-offset-2 col-xs-offset-1 col-xs-10">
<small><p>Check it all out on <a href="https://github.com/kdubbels/phone-book">GitHub</a>. Then check out some other <a href="http://resume.kristoferdubbels.com">sweet stuff about me</a>. This was a real challenge for me; like me, this app is not yet at 100% but is slowly assuming its ultimate form.</p></small>
</div>
  
<div class= "col-sm-4 col-sm-pull-4  col-md-pull-4  col-md-4 col-lg-pull-4 col-lg-4 col-xs-12">
<p class="text-center"><span class="kdfooter">KD</span></p>
<p class="text-center">Proudly built in Frederick, MD.</p>
<small><p class="text-center">Kristofer Dubbels, 2015.</p></small>
</div>
</div>

</footer>
<div class="stripes"></div>


<script src="js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54785615-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>