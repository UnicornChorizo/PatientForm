<?php
$db = new SQLite3('users.db');

if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == "yes") {
    $id = intval($_GET['id']);
    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('Location: index.php');
    exit;
} elseif (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    echo "Are you sure you want to delete this record? <br>";
    echo "<a href='delete.php?id=" . $id . "&confirm=yes'>Yes</a> | ";
    echo "<a href='index.php'>No</a>";
} else {
    die("Invalid request!");
}
?>