# GitUserGenerator
 PHP, Laravel

used api
----------
Registration Endpoint /api/auth/register, Method: POST

Add the following details:
name
email
password
password confimation


Login Endpoint /api/auth/login, Method: POST

Add the following details:
email
password



used web
---------
Generating github users info separated from register and login endpoint.


Access Login: localhost:8000/login
Input username/s on field, max is 10.  
On submit returns Github Info List from github endpoint and on cache from redis.


Code link reference:
generator.blade.php
list.blade.php
routes/web.php
controller/GeneratorController.php
