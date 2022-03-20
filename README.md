About movie app api

movie app api handles the logiic of creation  update and delete of movie list built on laravel 8 ,php version 8

Requirements
PHP 8 and above and larevel 8

Installation process

Clone the repository
Run composer update
create .env in the root directory  copy contents from .env.example to your .env
genetrate app key if necessary
run migrations
Start the app

Api docs

All routes except /login are protected 

baseUrl is the url of where the app is served
e.g http://127.0.0.1:7000/api/

Signup
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

Login
POST  baseUrl/login
payload
<code>
{
"email": "moses@gmail.coms", //required
"password": "123456", //required
}
<code>

All routes except login and register are protected token is generated on login

Add  bearer token to header


Add movie to list
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

Update movie
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

Delete movie
GET  baseUrl/movie/delete/{movieId}
