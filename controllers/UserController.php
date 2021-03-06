<?php
require_once dirname(__DIR__)."/models/User.php";
class UserController
{
    private function encode($value,$salt){
        return sha1($value . $salt );
    }
    private function isValid( $string = '' ) {
        return ( bool ) preg_match( "/^[a-zA-Z0-9]+$/" , $string );
    }
    public function registration(User $user){

        if(strlen($user->login)==0){
            throw new Exception("You must enter login!");
        }
        if(strlen($user->login)>32){
            throw new Exception("Login is longer than 32 characters!");
        }
        if(!$this->isValid($user->login)){
            throw new Exception("Non valid characters for login! use only a-z and 0-9 characters!");
        }
        if(strlen($user->password)==0){
            throw new Exception("You must enter password!");
        }
        if(strlen($user->password)<8){
            throw new Exception("Password is too short!");
        }
        if(strlen($user->password)>32){
            throw new Exception("Password is too long!");
        }
        if($this->userExist($user)){
            throw new Exception("User with same login exist!");
        }

        $user->password = $this->encode($user->password,$user->getSalt());

        $sql = "INSERT INTO users (login, password) VALUES ('$user->login' ,'$user->password')";
        MySQL::query($sql);
        $sql = "SELECT * FROM users WHERE login = '$user->login' AND password = '$user->password'";
        $result = MySQL::query($sql);
        if ($result->num_rows>0){
            $row = $result->fetch_array();

            return  new User($row['login'],null,$row['id']);
        }else{
            throw new Exception('Something went wrong, user was not added, try to login!');
        }
        return true;
    }

    public function delete(User $user){
        if($this->userExist($user)){
            $sql = "DELETE FROM users WHERE login = '$user->login'";
            MySQL::query($sql);
            return true;
        }else{
            throw new Exception('User does not exist!');
        }
    }
    public function login(User $user){
        if($this->userExist($user)){
            $user->password = $this->encode($user->password,$user->getSalt());
            $sql = "SELECT * FROM users WHERE login = '$user->login' AND password = '$user->password'";
            $result = MySQL::query($sql);
            if ($result->num_rows>0){
                $row = $result->fetch_array();

                return  new User($row['login'],null,$row['id']);
            }else{
                throw new Exception('Login or password is wrong!');
            }
        }else{
            throw new Exception('User does not exist!');
        }
    }

    public function userExist(User $user){
        $sql = "SELECT * FROM users WHERE login = '$user->login'";
        return  (bool) MySQL::query($sql)->num_rows != 0;
    }
}