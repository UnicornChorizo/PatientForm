<?php
$db = new SQLite3('users.db');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $db->querySingle("SELECT * FROM users WHERE id = $id", true);
} elseif (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $stmt = $db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, dob = :dob, sex = :sex WHERE id = :id");
    $stmt->bindValue(':firstname', $_POST['firstname']);
    $stmt->bindValue(':lastname', $_POST['lastname']);
    $stmt->bindValue(':dob', $_POST['dob']);
    $stmt->bindValue(':sex', $_POST['sex']);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('Location: index.php');
    exit;
} else {
    die("Invalid request!");
}
?>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
    First Name: <input type="text" name="firstname" value="<?php echo $result['firstname']; ?>"><br>
    Last Name: <input type="text" name="lastname" value="<?php echo $result['lastname']; ?>"><br>
    Date of Birth: <input type="date" name="dob" value="<?php echo $result['dob']; ?>"><br>
    Sex:
    <select name="sex">
        <option value="male" <?php if ($result['sex'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($result['sex'] == 'female') echo 'selected'; ?>>Female</option>
        <option value="other" <?php if ($result['sex'] == 'other') echo 'selected'; ?>>Other</option>
    </select><br>
    <input type="submit" name="submit" value="Update">
</form>
