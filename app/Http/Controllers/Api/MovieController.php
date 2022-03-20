<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function store(Request $request)
    {
        // validate request
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'unique:movies'],
            'year' => ['required'],
            'backdrop_path' => ['required'],
            'comment' => ['nullable'],
            'genre' => ['nullable'],
        ], ['title.unique' => 'This movie already exists in list']);

        if ($validation->fails()) {
            // report validation error
            return $this->returnValidationError($validation);
        }

        $movies = user()->movies();

        // allow 10 movies or less
        if ($movies->count() === 10) {
            return $this->returnError('You cannot add more than 10 movies to list');
        }

        $movies->create($request->all());

        return $this->returnResponse('Added to list successfully');
    }

    public function index()
    {
        // fethch user movies
        $movies = user()->movies()->get();

        return $this->returnResponse('Movie list fetched successfully', ['movies' => $movies]);

    }

    public function update(Request $request)
    {
        // validate request
        $validation = Validator::make($request->all(), [
            'title' => ['nullable'],
            'year' => ['nullable'],
            'backdrop_path' => ['nullable'],
            'comment' => ['nullable'],
            'genre' => ['nullable'],
            'movie_id' => ['required'],
        ]);

        if ($validation->fails()) {
            // report validation error
            return $this->returnValidationError($validation);
        }

        user()->movies()->where('id', $request->movie_id)->update(['comment' => $request->comment]);

        return $this->returnResponse('Movie updated successfully');

    }

    public function delete($id)
    {
        user()->movies()->where('id', $id)->delete();
        return $this->returnResponse('Movie deleted successfully');
    }
}
