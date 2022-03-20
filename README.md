About movie app api

<h4>movie app api is handles the logiic of creation  update and delete of movie list built on laravel 8 ,php version 8</h4>

<p>Requirements</p>
<ol>PHP 8 and above and larevel 8</ol>

<p>Installation process</p>

<ol>Clone the repository</ol>
<ol>Run composer update</ol>
<ol>create .env in the root directory  copy contents from .env.example to your .env</ol>
<ol>genetrate app key if necessary</ol>
<ol>run migrations</ol>
<ol>Start the app</ol>

<h1>Api docs<h1>
baseUrl is the url of where the app is served
e.g http://127.0.0.1:7000/api/

<h4>Signup</h4>
POST  baseUrl/register
<code>
payload {
    "name": "Moses John", //required
    "email": "moses@gmail.coms", //required
    "password": "123456", //required
    "password_confirmation": "123456" //required
}
<code>

<h4>Login</h4>
POST  baseUrl/login
<code>
payload {
    "email": "moses@gmail.coms", //required
    "password": "123456", //required
}
<code>


