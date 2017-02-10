<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Rest {

	public function action_index()
	{
        $this->response->body("<h1>How this shit works?</h1>
            <h2> API details </h2>
            <b>Sign Up:</b> /index.php/v1/auth/signup<br>
            <b>Login:</b>   /index.php/v1/auth/login<br>
            <b>Create Profile: </b> /index.php/v1/auth/profile/create<br>
            <b>View Profile:</b> /index.php/v1/auth/profile<br>
            ");
	}

} // End Welcome
