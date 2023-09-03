<?php

class Users {  
    public $id;  
    public $name;  
    public $address;
    public $balance;
    public $email; 
    public $password;
    public $token;  
      
    public function __construct($id, $name, $address, $balance, $email, $password, $token)    
    {    
        $this->id = $id;  
        $this->name = $name;  
        $this->address = $address;
	$this->balance = $balance;
	$this->email = $email;
	$this->password = $password;
	$this->token = $token;  
    }   
}  

?>