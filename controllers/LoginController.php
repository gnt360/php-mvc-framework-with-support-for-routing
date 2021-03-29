<?php
namespace app\controllers;
use app\core\Request;
use app\core\Controller;
/**
 * Class LoginController
 * 
 * @package app\controllers
 */
class LoginController extends Controller
{
    public function login()
    {
        $params = [
            'name' => "Login"
        ];
        return $this->render('login', $params);
    }

    public function handleLogin(Request $request)
    {
        $input = $request->getBody();
        // echo '<pre>';
        // var_dump($input);
        // echo '</pre>';
        // exit;
        return 'Logged in';
    }
}