<?php

namespace app\controllers\apis;

use app\models\User;
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
        
        $register = new User();
        if ($request->isPost())
        {
            $register->loadData($request->getBody());
            if($register->validate() && $register->register())
            {
                return 'Account successfully created';
            }
           
            return  $register;
        }
        $this->setLayout('auth');
        return  $register;
    }
}