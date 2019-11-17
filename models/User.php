<?php

class User
{


    public $login;
    public $password;

    /**
     * User constructor.
     * @param $login
     * @param $passoword
     */
    public function __construct($login, $password)
    {
        $this->login = strtolower($login);
        $this->password = $password;
    }
    public function getSalt(){
        return $this->login . $this->password;
    }

}