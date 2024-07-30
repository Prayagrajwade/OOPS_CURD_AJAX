<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD with AJAX</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>PHP CRUD with AJAX</h2>
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dynamic Content -->
        </tbody>
    </table>

    <form id="userForm">
        <input type="hidden" name="id" id="userId">
        <input type="text" name="name" id="userName" placeholder="Name" required>
        <input type="email" name="email" id="userEmail" placeholder="Email" required>
        <button type="submit">Save</button>
    </form>

    <script>
        $(document).ready(function() {
            // Fetch all users
            function fetchUsers() {
                $.ajax({
                    url: 'read.php',
                    type: 'GET',
                    success: function(response) {
                        $('#userTable tbody').html(response);
                    }
                });
            }

            fetchUsers();

            // Create/Update user
            $('#userForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'save.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        $('#userForm')[0].reset();
                        fetchUsers();
                    }
                });
            });

            // Edit user
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                window.location.href = 'update.php?id=' + id;
            });

            // Delete user
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        url: 'delete.php',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            alert(response);
                            fetchUsers();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
