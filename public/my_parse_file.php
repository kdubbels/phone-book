<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php 
echo 'Thank you '. $_POST['first_name'] . ' ' . $_POST['last_name'] . ' ' . $_POST['phone'] . ', says the PHP file';
?>
<?php
    $first_name = $_POST["first_name"];
    $last_name =  $_POST["last_name"];
    $phone = ($_POST["phone"]);


    $query  = "INSERT INTO people (";
    $query .= "  first_name, last_name, phone";
    $query .= ") VALUES (";
    $query .= "  '{$first_name}', '{$last_name}', '{$phone}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

   ?>