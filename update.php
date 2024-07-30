<?php
require_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->id = $_GET['id'];
$user_details = $user->readOne();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="save.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user_details['id']; ?>">
        <input type="text" name="name" value="<?php echo $user_details['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $user_details['email']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
