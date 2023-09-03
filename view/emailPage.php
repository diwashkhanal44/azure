<!DOCTYPE html>
<html>
<head>
    <title>Email Status</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <?php
    if (isset($_GET['status']) && isset($_GET['email']) && isset($_GET['message'])) {
        $status = $_GET['status'];
        $email = $_GET['email'];
        $message = urldecode($_GET['message']);

        if ($status === "success") {
            echo "<h1 style=\"text-align: center;\">Mail is sent to $email successfully. $message</h1>";
        } elseif ($status === "failure") {
            echo "<h1 style=\"text-align: center;\">Mail is not sent to $email. $message</h1>";
        }

        echo '<div style="position: absolute; top: 20px; right: 20px;">
                <a href="../index.php" style="display: inline-block; background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Go to Home</a>
              </div>';
    } else {
        echo "<h1 style=\"text-align: center;\">Invalid request.</h1>";
    }
    ?>
</body>
</html>
