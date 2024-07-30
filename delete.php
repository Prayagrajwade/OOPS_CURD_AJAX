<?php
require_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->id = $_POST['id'];

if ($user->delete()) {
    echo "User deleted successfully.";
} else {
    echo "Failed to delete user.";
}
?>
