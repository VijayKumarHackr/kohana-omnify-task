<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Profile extends Controller_Rest {

    public function action_index() {

        if(!Auth::instance()->logged_in()) {
            $this->response->body('Please login before you proceed to visit your profile');
        } else {
            $user_profile = Auth::instance()->get_user()->profile;
            $this->response->body("<h2>Welcome to your Profile page!</h2><br>
                First name: $user_profile->fname,<br>
                Last name:  $user_profile->lname,<br>
                Gender:     $user_profile->gender,<br>
                Age:        $user_profile->age,<br>
                Location:   $user_profile->location
                ");
        }
    }

    public function action_create() {
        if(!Auth::instance()->logged_in()) {
            $this->response->body('Please login before you proceed to create your profile');
        } else if($_POST) {
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
        } else {
            $this->response->body("Please provide the details using POST method");
        }
    }
}
