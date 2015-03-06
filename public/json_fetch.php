<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php
 
$query  = "SELECT * FROM people ";
		$result = mysqli_query($connection, $query);
		$res = array();
 
 	while($subject = mysqli_fetch_array($result))
		    array_push($res, array('first_name' => $subject[1],
			                          'last_name'  => $subject[2],
						  'phone' => $subject[3]));
 
		echo json_encode(array("result" => $res));
	
?>




