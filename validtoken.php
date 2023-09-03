<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .user-details {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .logout-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    require_once('controller/Controller.php');
    $controller = new Controller();
    if (isset($_GET['username']) && isset($_GET['token'])) {
        $token = $_GET['token'];
        $email = $_GET['username'];

        $validateToken = $controller->validateToken($token);

        if ($validateToken) {
            $arr = $controller->viewDetails($email);

            if (!empty($arr)) {
                echo '<div class="user-details">';
                foreach ($arr as $user) {
                    echo '<p>ID: ' . $user->id . '</p>';
                    echo '<p>Name: ' . $user->name . '</p>';
                    echo '<p>Address: ' . $user->address . '</p>';
                    echo '<p>Balance: ' . $user->balance . '</p>';
                    echo '<p>Email: ' . $user->email . '</p>';
                    echo '<p>Token: ' . $user->token . '</p>';
                }
                echo '<a class="logout-button" href="view/logout.php">Logout</a>';
                echo '</div>';
            } else {
                echo '<h1 style="text-align: center;">No user details found.</h1>';
            }
        } else {
            echo '<h1 style="text-align: center;">Token not validated</h1>';
        }
    } else {
        echo '<h1 style="text-align: center;">Invalid request.</h1>';
    }
    ?>
</body>
</html>
