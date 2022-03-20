About movie app api

<h4>movie app api handles the logiic of creation  update and delete of movie list built on laravel 8 ,php version 8</h4>

<p>Requirements</p>
<p>PHP 8 and above and larevel 8</p>

<p>Installation process</p>

<p>Clone the repository</p>
<p>Run composer update</p>
<p>create .env in the root directory  copy contents from .env.example to your .env</p>
<p>genetrate app key if necessary</p>
<p>run migrations</p>
<p>Start the app</p>

<h1>Api docs<h1>

All routes except /login are protected 

<p>baseUrl is the url of where the app is served
e.g http://127.0.0.1:7000/api/</p>

<h4>Signup</h4>
POST  baseUrl/register

payload
<code>
{
"name": "Moses John", //required
"email": "moses@gmail.coms", //required
"password": "123456", //required
"password_confirmation": "123456" //required
}
<code>

<h4>Login</h4>
POST  baseUrl/login
payload
<code>
{
"email": "moses@gmail.coms", //required
"password": "123456", //required
}
<code>

<h3>All routes except login and register are protected token is generated on login</h3>
<p>
Add  bearer token to header
</p>

<h4>Add movie to list</h4>
POST  baseUrl/movie/create
payload
<code>
{
    "title":"hieg",//required
    "year":"egeh",//required
    "backdrop_path":"heh",//required
    "genre":"hh",//required
    "comment":"hehh" //not required
}
<code>

<h4>Update movie</h4>
POST  baseUrl/movie/update
payload
<code>
{
    "title":"hieg",//not required
    "year":"egeh",//not required
    "backdrop_path":"heh",//not required
    "genre":"hh",//not required
    "comment":"hehh" //not required
    "movie_id": //required

}

<h4>Delete movie</h4>
GET  baseUrl/movie/delete/{movieId}
