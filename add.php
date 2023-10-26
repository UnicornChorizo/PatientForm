<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Add User</title>
</head>
<body>

<h2>Add New User</h2>

<form action="save.php" method="post">
    First Name: <input type="text" name="firstname"><br>
    Last Name: <input type="text" name="lastname"><br>
    Date of Birth: <input type="date" name="dob"><br>
    Sex:
    <select name="sex">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select><br>
    <input type="submit" value="Add User">
</form>

<br>
<a href="index.php">Back to User List</a>

</body>
</html>
