<?php

namespace app\controllers\apis;

use app\models\User;
use app\core\Request;
use app\models\Login;
use app\core\Controller;

/**
 * Class AuthController
 * 
 * @package app\controller\apis
 */
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = new Login();
        if ($request->isPost())
        {
            $login->loadData($request->getBody());
            if ($login->validate() && $login->login()) {
                
                return "logged in";
            }
        }
        return "failed";
    }

    public function logout()
    {       
        return $this->render('login');
    }

    public function register(Request $request)
    {        
        $user = new User();
        if ($request->isPost())
        {
            $user->loadData($request->getBody());
            if($user->validate() && $user->save())
            {
                return 'Account successfully created';
            }
           echo '<pre>';
           var_dump($user);
           echo '</pre>';
            return  "account creation failed";
            //return  $register;
        }
        $this->setLayout('auth');
        return  $register;
    }
}