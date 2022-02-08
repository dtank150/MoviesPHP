<?php

// Includs database connection
include "dbconnect.php";

// Makes query with rowid
$query = "SELECT id, * FROM Movies";

// Run the query and set query result in $result
// Here $db comes from "db_connect.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data List</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">
		<a href="insert.php">Add New</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>Movie name</td>
				<td>Actor</td>
				<td>Actress</td>
                <td>Year</td>
                <td>Director</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['actor'];?></td>
                <td><?php echo $row['actress'];?></td>
				<td><?php echo $row['year'];?></td>
                <td><?php echo $row['director'];?></td>
			    <td>
					<a href="update.php?id=<?php echo $row['id'];?>">Edit</a> | 
					<a href="delete.php?id=<?php echo $row['id'];?>"  confirm('Are you sure?');">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>