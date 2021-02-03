<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index()
    {
        return view('timeline.home', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:225']);
        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $attributes['body']
        ]);

        return redirect('/tweets');
    }
}
