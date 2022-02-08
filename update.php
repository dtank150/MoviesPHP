<?php
$message = ""; // initial message 

// Includs database connection
include "dbconnect.php";

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$name = $_POST['name'];
	$actor = $_POST['actor'];
    $actress = $_POST['actress'];
    $year = $_POST['year'];
    $director = $_POST['director'];

	// Makes query with post data
	$query = "UPDATE Movies set name='$name', actor='$actor', actress='$actress', year='$year', director='$director' WHERE id=$id";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connect.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepar the query to get the row data with rowid
$query = "SELECT id, * FROM Movies WHERE id=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
				<td>Movie name:</td>
				<td><input name="name" type="text"></td>
			</tr>
			<tr>
				<td>Actor:</td>
				<td><input name="actor" type="text"></td>
			</tr>
            <tr>
				<td>Actress:</td>
				<td><input name="actress" type="text"></td>
			</tr>
            <tr>
				<td>Year:</td>
				<td><input name="year" type="text"></td>
			</tr>
            <tr>
				<td>Director:</td>
				<td><input name="director" type="text"></td>
			</tr>
			<tr>
				<td><a href="list.php">Back</a></td>
				<td><input name="submit_data" type="submit" value="Update Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>