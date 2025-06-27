<?php
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matric = $_GET['matric'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f2f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .form-container {
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }

            input[type="text"],
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                width: 100%;
                margin-top: 10px;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }

            .cancel-link {
                display: block;
                text-align: center;
                margin-top: 15px;
                color: #888;
                text-decoration: none;
                font-size: 14px;
            }

            .cancel-link:hover {
                color: #333;
            }
        </style>
    </head>

    <body>
        <div class="form-container">
            <h1>Update User</h1>
            <form action="update.php" method="post">
                <input type="hidden" name="original_matric" value="<?php echo $userDetails['matric']; ?>">

                <label for="matric">Matric:</label>
                <input type="text" id="matric" name="matric" value="<?php echo $userDetails['matric']; ?>" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>" required>

                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="">Please select</option>
                    <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
                    <option value="student" <?php if ($userDetails['role'] == 'student') echo "selected"; ?>>Student</option>
                </select>

                <input type="submit" value="Update">
                <a class="cancel-link" href="read.php">Cancel</a>
            </form>
        </div>
    </body>

    </html>
    <?php
}
?>
