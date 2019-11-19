<?php
class User
{
    public $login;
    public $password;

    public function __construct($login, $password)
    {
        $this->login = strtolower($login);
        $this->password = $password;
    }
    public function getSalt(){
        return $this->login . $this->password;
    }

}