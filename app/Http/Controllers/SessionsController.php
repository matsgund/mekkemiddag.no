<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth', ['only' => ['logout' ]]);

    }

    public function create(){

       return view('login');

   }

   // Attempts to log the user in
   public function store(){

       if (!auth()->attempt(request(['email','password']))) {

           return back();
       }
       $posts= Post::orderBy('created_at', 'desc')->get();

       return view('adminindex', compact('posts'));
   }

   //Logs user out
   public function destroy(){

        auth()->logout();

        return redirect('login');

   }
}
