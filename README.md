#Omnify Task

API end point for the following Signup, Login, Create User Profile (After Login), View User Profile (After Login)

## How this shit works?

### API details
* Sign Up: `/index.php/v1/auth/signup`
* Login: `/index.php/v1/auth/login`
* Create Profile: `/index.php/v1/auth/profile/create`
* View Profile: `/index.php/v1/auth/profile`

### Database
`database-mysql.sql` is your database file. Following command can be used to setup the database on Linux machines.

```
$ cd omnify-task/
$ mysql -u username -p database < database-mysql.sql
```
