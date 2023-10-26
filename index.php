<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('users.db');

// Check if there are any users
$results = $db->query('SELECT COUNT(*) as count FROM users');
$row = $results->fetchArray();
$totalUsers = $row['count'];

?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>User Form</title>
</head>
<body>

<?php
// If there are users, display the list
if ($totalUsers > 0) {
    $results = $db->query('SELECT * FROM users');

    echo "<h2>Existing Users:</h2>";
    while ($row = $results->fetchArray()) {
        echo "ID: " . $row['id'] . " | Name: " . $row['firstname'] . " " . $row['lastname'] . " | DOB: " . $row['dob'] . " | Sex: " . $row['sex'];
        echo " <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |";
        echo " <a href='delete.php?id=" . $row['id'] . "'>Delete</a><br>";
    }
    echo "<br><a href='add.php'>Add New User</a>";

} else {
    // Otherwise, redirect to add.php to add a new user
    header('Location: add.php');
    exit;
}
?>

</body>
</html>
