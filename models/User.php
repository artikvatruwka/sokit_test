<?php
class User
{
    public $login;
    public $password;
    public $id;
    public function __construct($login, ?string $password = null, ?int $id = null)
    {
        $this->login = strtolower($login);
        $this->password = $password;
        $this->id = $id;
    }
    public function getSalt(){
        return $this->login . $this->password;
    }

}