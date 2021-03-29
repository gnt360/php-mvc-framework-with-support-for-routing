<?php

namespace app\controllers\apis;

use app\core\Request;
use app\core\Controller;

/**
 * Class AuthController
 * 
 * @package app\controller\apis
 */
class AuthController extends Controller
{
    public function login()
    {
        if ($request->isPost())
        {
            return 'Logged in';
        }
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function logout()
    {
       
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost())
        {
            return 'Registered';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}