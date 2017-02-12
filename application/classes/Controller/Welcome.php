<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Rest {

	public function action_index()
	{
        $this->response->body("
<html>
<head>
    <title>Kohana RESTful API</title>
    <script type='text/css'>
        body {
          padding: 50px;
          font: 16px 'Lucida Grande', Helvetica, Arial, sans-serif;
        }

        a {
          color: #00B7FF;
        }
    </script>
</head>
</body>
<h2>How this shit works?</h2>
<ul>
    <li>Open up http://localhost/omnify-task/index.php/ in browser.</li>
    <li>Interact with the app using Postman (for Google Chrome) or RESTClient (for Firefox).</li>
    <li>Details of variables which are to be sent with data, to a URI, can be obtained by GET request to the corresponding URI.</li>
</ul>

<h2> API details </h2>
<table border='1px'>
    <tr><th>Action</th>                 <th>Path / URI</th>                         <th>Method</th></tr>
    <tr><td><b>Sign Up</b></td>        <td>/index.php/v1/auth/signup</td>          <td>POST</td></tr>
    <tr><td><b>Login</b></td>          <td>/index.php/v1/auth/login</td>           <td>POST</td></tr>
    <tr><td><b>Logout</b></td>         <td>/index.php/v1/auth/logout</td>          <td>GET</td></tr>
    <tr><td><b>Create Profile</b></td> <td>/index.php/v1/profile/create</td>       <td>POST</td></tr>
    <tr><td><b>View Profile</b></td>   <td>/index.php/v1/profile</td>              <td>GET</td></tr>
</table>
</body>
</html>
        ");
	}

} // End Welcome
