<?php
class UserController
{
    public function registration(User $user){
        MySQL::query("SELECT id FROM users WHERE username = ?");
    }
    public function delete(User $user){

    }
    public function login(User $user){

    }
    public function logout(User $user){

    }
    public function getUsers(){
        $users = array();
        $result = MySQL::query();

        array_push($users,new User($result->fetch_array()));
        return  $users;
    }
}