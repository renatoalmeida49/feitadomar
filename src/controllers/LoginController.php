<?php
namespace src\controllers;

use core\Controller;
use src\handlers\UserHandler;

class LoginController extends Controller {

	public function index() {
		$this->render('login');
	}

	public function login() {
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'password');

        if($login && $password) {
            $token = UserHandler::verifyLogin($login, $password);

            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem';
                $this->redirect('/');
            }
        } else {
            $_SESSION['flash'] = 'Algo errado com login ou senha';
            $this->redirect('/');
        }
    }

	public function singup() {
		$name = filter_input(INPUT_POST, 'name');
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'passoword');
		$repeat = filter_input(INPUT_POST, 'repeatPassoword');

		if($password == $repeat) {
			if(!UserHandler::loginExists($login)) {
				$token = UserHandler::addUser($name, $login, $password);

				$_SESSION['token'] = $token;
				$this->redirect('/');
			}
		} else {
			$_SESSION['flash'] = 'Senhas digitadas não conferem';
			// TODO
			// 1. Open the home page with the modal open and the error message
		}
	}

	public function logoff() {
		$_SESSION['token'] = '';
		$this->redirect('/');
	}
}