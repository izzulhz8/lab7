<?php
include 'session_check.php';
include 'Database.php';
include 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .logout {
            float: right;
            margin-bottom: 20px;
            background-color: #ff5722;
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #e64a19;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a.button {
            text-decoration: none;
            padding: 6px 12px;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
        }

        a.update {
            background-color: #4CAF50;
        }

        a.delete {
            background-color: #f44336;
        }

        a.update:hover {
            background-color: #45a049;
        }

        a.delete:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>
    <a href="logout.php" class="logout">Logout</a>
    <h1>User List</h1>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["matric"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["role"]; ?></td>
                    <td><a class="button update" href="update_form.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
                    <td><a class="button delete" href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        $db->close();
        ?>
    </table>
</body>

</html>
