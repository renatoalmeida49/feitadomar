<?php
namespace src\handlers;

use src\models\User;

class UserHandler {
    public static function checkLogin() {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if (count($data) > 0) {

                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->login = $data['login'];
                
                return $loggedUser;
            }
        }

        return false;
    }

    public static function verifyLogin($login, $password) {
        $user = User::select()->where('login', $login)->one();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());

                User::update()
                    ->set('token', $token)
                    ->where('login', $login)
                ->execute();

                return $token;
            }
        }

        return false;
    }

    public static function validateUpdateLogin($login, $id) {
        $user = User::select()
                ->where('login', $login)
            ->get();
        
        if(count($user) == 0) {
            return true;
        }

        if(count($user) == 1) {
            if($user[0]['id'] == $id) {
                return true;
            }
        }

        return false;
    }

    public static function loginExists($login) {
        $user = User::select()->where('login', $login)->one();
        return $user ? true : false;
    }

    public static function addUser($name, $login, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());

        User::insert([
            'name' => $name,
            'login' => $login,
            'password' => $hash,
            'token' => $token
        ])->execute();

        return $token;
    }

    public static function getUser($id) {
        $data = User::select()->where('id', $id)->one();

        if($data) {
            $user = new User();
            $user->id = $data['id'];
            $user->name = $data['name'];
            $user->login = $data['login'];

            return $user;
        }

        return false;
    }

    public static function update($update) {
        if($update['password'] == '') {
            $result = User::update()
                        ->set('name', $update['name'])
                        ->set('login', $update['login'])
                        ->where('id', $update['id'])
                    ->execute();
        } else {
            $hash = password_hash($update['password'], PASSWORD_DEFAULT);

            $result = User::update()
                        ->set('name', $update['name'])
                        ->set('login', $update['login'])
                        ->set('password', $hash)
                        ->where('id', $update['id'])
                    ->execute();
        }

        return $result;
    }
}