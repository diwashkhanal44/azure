<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('view/login.php');
require_once('controller/Controller.php');
require_once('model/DBConn.php');

$controller = new Controller();
if (isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];

    if (!empty($email) && !empty($password)) {
        $controller->validate($email, $password);
    } else {
        echo "<html><h1 style=\"text-align: center;\">Please enter both email and password</h1></html>";
    }
}
?>