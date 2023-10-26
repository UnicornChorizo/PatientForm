<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];

// Connect to SQLite database
$db = new SQLite3('users.db');

// Create table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, firstname TEXT, lastname TEXT, dob TEXT, sex TEXT)");

// Insert data into table
$stmt = $db->prepare("INSERT INTO users (firstname, lastname, dob, sex) VALUES (:firstname, :lastname, :dob, :sex)");
$stmt->bindValue(':firstname', $firstname, SQLITE3_TEXT);
$stmt->bindValue(':lastname', $lastname, SQLITE3_TEXT);
$stmt->bindValue(':dob', $dob, SQLITE3_TEXT);
$stmt->bindValue(':sex', $sex, SQLITE3_TEXT);
$stmt->execute();

echo "Data saved successfully!";
header('Location: index.php');
exit;


