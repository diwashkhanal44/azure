
<?php
require_once('Users.php');

class Model {
   public function searchUser($email) {
    include_once("DBConn.php");
 	$mysqli = new mysqli('localhost', 'root', '12Australia@21', 'customer');
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

    $sql = "SELECT * FROM assignment WHERE email LIKE '%" . $email . "%'";
    $result = $mysqli->query($sql);
    $arr = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $arr[$row['id']] = new Users(
            $row['id'],
            $row['name'],
            $row['address'],
            $row['balance'],
            $row['email'],
            $row['password'],
            $row['token'] 
        );
    }
    return $arr;
}

    public function validateUser($uname, $password) {
        include_once("DBConn.php");

        $sql = "SELECT username FROM users WHERE username = '$uname' AND password = '$password'";
        $result = $mysqli->query($sql);

        if ($result->num_rows === 1) {
            return "Username $uname and password validated";
        } else {
            return "$uname and password not validated";
        }
    }

    public function validate($email, $password) {
        include_once("DBConn.php");
        $mysqli = new mysqli('localhost', 'root', '12Australia@21', 'customer');//ip,dbuser,dbpassword,database name
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $sql = "SELECT email FROM assignment WHERE email = '$email' AND password = '$password'";
        $result = $mysqli->query($sql);

        if ($result->num_rows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function storeToken($token, $email) {
        // include_once("DBConn.php");
        // global $mysqli; 
        $mysqli = new mysqli('localhost', 'root', '12Australia@21', 'customer');
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $sql = "SELECT COUNT(*) AS count FROM assignment WHERE email = '$email'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        $count = $row['count'];

        if ($count === 0) {
            // If no record is present for the email, insert a new token.
            $insertSql = "INSERT INTO assignment (email, token) VALUES ('$email', '$token')";
            $mysqli->query($insertSql);
        } else {
            // Update the existing token for the email.
            $updateSql = "UPDATE assignment SET token = '$token' WHERE email = '$email'";
            $mysqli->query($updateSql);
        }
    }
    public function validateToken($token){
$mysqli = new mysqli('localhost', 'root', '12Australia@21', 'customer');       
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $sql = "SELECT token FROM assignment WHERE token = '$token'";
        $result = $mysqli->query($sql);
        if ($result->num_rows === 1) {
            return true;
        } else {
            return false;
        }
    }
}
?>
