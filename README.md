

API end point for the following Signup, Login, Create User Profile (After Login), View User Profile (After Login)

## How this shit works?

### API details
| Action         | Path                                | Method |
|----------------|-------------------------------------|--------|
| Sign Up        | `/index.php/v1/auth/signup`         | POST   |
| Login          | `/index.php/v1/auth/login`          | POST   |
| Logout         | `/index.php/v1/auth/logout`         | GET    |
| Create Profile | `/index.php/v1/auth/profile/create` | POST   |
| View Profile   | `/index.php/v1/auth/profile`        | GET    |

### Database
`database-mysql.sql` is your database file. Following command can be used to setup the database on Linux machines.

```
$ cd omnify-task/
$ mysql -u username -p database < database-mysql.sql
```
*NOTE*: Tested using RESTClient (for firefox).
