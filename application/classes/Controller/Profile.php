<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Profile extends Controller_Rest {

    public function action_index() {

        if(!Auth::instance()->logged_in()) {
            $this->response->body('Please login before you proceed to visit your profile');
        } else if(Auth::instance()->get_user()->profile->fname    ||
                    Auth::instance()->get_user()->profile->lname  ||
                    Auth::instance()->get_user()->profile->gender ||
                    Auth::instance()->get_user()->profile->age    ||
                    Auth::instance()->get_user()->profile->location) {
            $user_profile = Auth::instance()->get_user()->profile;
            $this->response->body("<h2>Welcome to your Profile page!</h2><br>
                <table border='1px'>
                    <tr><td>First name:</td><td>$user_profile->fname</td></tr>
                    <tr><td>Last name:</td><td>$user_profile->lname</td></tr>
                    <tr><td>Gender:    </td><td>   $user_profile->gender</td></tr>
                    <tr><td>Age:       </td><td>    $user_profile->age</td></tr>
                    <tr><td>Location:  </td><td>  $user_profile->location</td></tr>
                </table>
                ");
        } else {
            $this->response->body("Your profile is not yet created. Please create your profile.");
        }
    }

    public function action_create() {
        if(!Auth::instance()->logged_in()) {
            $this->response->body('Please login before you proceed to create your profile');
        } else if($_POST) {
            if(Auth::instance()->get_user()->profile->fname    ||
                 Auth::instance()->get_user()->profile->lname  ||
                 Auth::instance()->get_user()->profile->gender ||
                 Auth::instance()->get_user()->profile->age    ||
                 Auth::instance()->get_user()->profile->location) {
                $this->response->body("You've already created your profile.");
            } else {
                $user = Auth::instance()->get_user();
                $_POST['user_id'] = $user->id;
                $user->profile->values($_POST, array(
                    'user_id',
                    'fname',
                    'lname',
                    'gender',
                    'age',
                    'location',
                ))->create();
                $this->response->body('Your profile has been created!');
            }
        } else {
            $this->response->body("Please provide the following details using POST method:
                <table border='1px'>
                <tr>
                <th>POST variable</th>
                <th>Meaning</th>
                </tr>
                <tr>
                <td>fname</td>
                <td>First name</td>
                </tr>
                <tr>
                <td>lname</td>
                <td>Last name</td>
                </tr>
                <tr>
                <td>gender</td>
                <td>Gender</td>
                </tr>
                <tr>
                <td>age</td>
                <td>Age</td>
                </tr>
                <tr>
                <td>location</td>
                <td>Location</td>
                </tr>
                </table>
                ");
        }
    }
}
