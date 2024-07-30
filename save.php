<?php
require_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->id = isset($_POST['id']) ? $_POST['id'] : null;
$user->name = $_POST['name'];
$user->email = $_POST['email'];

if ($user->id) {
    // Update user
    if ($user->update()) {
        echo "User updated successfully.";
    } else {
        echo "Failed to update user.";
    }
} else {
    // Create user
    if ($user->create()) {
        echo "User created successfully.";
    } else {
        echo "Failed to create user.";
    }
}
?>
