<?php
require_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$result = $user->readAll();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td class='action-btns'>
                    <button class='edit-btn' data-id='{$row['id']}'>Edit</button>
                    <button class='delete-btn' data-id='{$row['id']}'>Delete</button>
                </td>
              </tr>";
    }
}
?>
