<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Rest {

    public function action_index()
    {
        if(Auth::instance()->logged_in())
        {
            $this->response->body('You are logged in');
        }
        else
        {
            $this->response->body("You are <b>not</b> logged in");
        }
    }

    public function action_signup()
    {
        if(Auth::instance()->logged_in())
        {
            $this->response->body("You are already logged in!");
        }
        else if($_POST)
        {
            try {
                $_POST['password_confirm'] = $_POST['password'];
                $user = ORM::factory('User')->create_user($_POST, array(
                    'username',
                    'password',
                    'email',
                ))->add('roles', ORM::factory('Role')->find(1));
                
                if($user) {
                    $this->response->body($user->username.'! You signed up!');
                }
            } catch(ORM_Validation_Exception $e) {
                $this->response->body("Validation error! ". $e);
            }
        }
        else {
            $this->response->body("<h2>Please provide the following details using POST method:</h2>
                <table border='1px'>
                <tr><th>POST variable</th><th>Meaning</th></tr>
                <tr><td>username</td><td>Username</td></tr>
                <tr><td>email</td><td>Email</td></tr>
                <tr><td>password</td><td>Password</td></tr>
                </table>
                ");
        }
    }

    public function action_login()
    {
        if(Auth::instance()->logged_in())
        {
            $this->response->body("You are already logged in!");
        } else {
            if($_POST) {
                $email = $_POST[ 'email' ];
                $password = $_POST[ 'password' ];

                $response = Auth::instance()->login($email, $password);
                
                if($response)
                {
                    $this->response->body("You have been logged in!");
                } else {
                    $this->response->body("Authentication failed");
                }
            }
            else {
                $this->response->body("<h2>Please provide the following details using POST method:</h2>
                    <table border='1px'>
                    <tr><th>POST variable</th><th>Meaning</th></tr>
                    <tr><td>email</td><td>Email</td></tr>
                    <tr><td>password</td><td>Password</td></tr>
                    </table>
                ");
            }
        }
    }

    public function action_logout()
    {
        if(Auth::instance()->logged_in())
        {
            Auth::instance()->logout();
            $this->response->body('Logged out!');
        }
        else {
            $this->response->body('You are already logged out!');
        }
    }

}
