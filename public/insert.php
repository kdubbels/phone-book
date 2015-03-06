<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php
		// $first_name = $_POST['first_name'];
		// $last_name = $_POST['last_name'];
 	// 	$phone = $_POST['phone'];

  //   $query  = "INSERT INTO people (";
  //   $query .= "  first_name, last_name, phone";
  //   $query .= ") VALUES (";
  //   $query .= "  '{$first_name}', '{$last_name}', '{$phone}'";
  //   $query .= ")";
  //   $result = mysqli_query($connection, $query);

?>

<?php
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
 		$phone = $_POST['phone'];

 		$first_name = mysqli_real_escape_string($connection, $first_name);
 		$last_name = mysqli_real_escape_string($connection, $last_name);
 		$phone = mysqli_real_escape_string($connection, $phone);

    $query  = "INSERT INTO people (";
    $query .= "  first_name, last_name, phone";
    $query .= ") VALUES (";
    $query .= "  '{$first_name}', '{$last_name}', '{$phone}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

?>