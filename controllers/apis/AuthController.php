<?php

namespace app\controllers\apis;

use app\core\Request;
use app\core\Controller;
use app\models\Register;

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
        
        $register = new Register();
        if ($request->isPost())
        {
            $register->loadData($request->getBody());
            if($register->validate() && $register->register())
            {
                return 'success';
            }

           
            return $this->render('register', [
                'model' => $register
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $register
        ]);
    }
}