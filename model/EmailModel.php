<?php

class EmailModel {

    public function send($email, $message, $subject) {
        $stri = 'echo "' . $message . '" | mail -s "' . $subject . '" ' . $email;
        $last_line = system($stri, $retval);

        if ($retval == 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>