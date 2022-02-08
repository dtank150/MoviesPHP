<?php
// Database name
//$database_name = "Movies";
// Database Connection
$db = new SQLite('Movies.db');
// Create Table "students" into Database if not exists 
$query = "CREATE TABLE IF NOT EXISTS movie (id integer, movie_name char ,actor char, actress char, year integer, director char)";
$db->exec($query);
?>
