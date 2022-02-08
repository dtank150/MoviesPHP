<?php
$message = "";
if( isset($_POST['submit_data']) ){
	// Includs database connection
	include "dbconnect.php";

	// Gets the data from post
	$name = $_POST['name'];
	$actor = $_POST['actor'];
    $actress = $_POST['actress'];
    $year = $_POST['year'];
    $director = $_POST['director'];
    
	// Makes query with post data
	$query = "INSERT INTO movie (movie_name,actor,actress,year,director)
    VALUES('$name','$actor','$actress','$year','$director')";

		// Executes the query
	// If data inserted then set success message otherwise set error message
	if( $db->exec($query) ){
		$message = "Data inserted successfully.";
	}else{
		$message = "Sorry, Data is not inserted.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="post">
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
				<td><a href="list.php">See Data</a></td>
				<td><input name="submit_data" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>