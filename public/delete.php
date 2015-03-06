<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php

	//$id = "id";
  	//$query = "DELETE FROM people WHERE id = {$id} LIMIT 1";
  	//$result = mysqli_query($connection, $query);
?>
// <?php



//   $id = "id";
//   $query = "DELETE FROM people WHERE id = {$id} LIMIT 1";
//   $result = mysqli_query($connection, $query);

//   ?>


<?php

	if( isset($_GET['del']) )
	{
		$id = $_GET['del'];
		$query = "DELETE FROM people WHERE id='$id'";
		$result = mysqli_query($connection, $query);
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>