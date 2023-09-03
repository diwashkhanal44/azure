<?php
require_once('model/EmailModel.php');
require_once('model/Model.php');

class Controller {
    private $model;

    public function validate($email, $password) {
        $this->model = new Model();
        $isValidate = $this->model->validate($email, $password);

        if ($isValidate == true) {
            $token = $this->generateToken();
	    $this->model->storeToken($token,$email);
            $this->mail($email, $token);
        } else {
            echo "<html><h1 style=\"text-align: center;\">$email and password do not match</h1></html>";
        }
    }

    public function generateToken() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $token = '';
        $length = 7;

        $charCount = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charCount - 1);
            $token .= $characters[$randomIndex];
        }

        return $token;
    }

    public function mail($email, $token) {
        $emailModel = new EmailModel();
        $message = "Dear $email,\nPlease use the following link to login to the website:\nhttps://20.70.105.251:7042/assignment/validtoken.php?username=$email&token=$token\n\nAdmin Team";
        $subject = "Authorization email";
        $sent = $emailModel->send($email, $message, $subject);

        if ($sent) {
            header("Location: view/emailPage.php?status=success&email=" . urlencode($email) . "&message=" . urlencode($message));
            exit;
        } else {
            header("Location: view/emailPage.php?status=failure&email=" . urlencode($email) . "&message=" . urlencode($message));
            exit;
        }
    }

    public function validateToken($token){
        $model = new Model();
        $status =  $model->validateToken($token);
        if($status){
            return true;
        }else{
            return false;
        }

    }
     public function viewDetails($email){
        $model = new Model();
        $arr =  $model->searchUser($email);
	return $arr;  
      }



}
?>
