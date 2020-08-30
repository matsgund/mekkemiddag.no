<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class PostController extends Controller

{
    // pages that only admin can visit
    public function __construct()
    {
        //returns login page if a user is not logged in
        if (!$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete', 'adminindex']])) {

            return view('login');

        }
    }

    //Index view
    public function index() {

        $posts= Post::orderBy('created_at', 'desc')->get();

        return view('index', compact('posts'));
    }

    //Adminindex view
    public function adminindex() {

        $posts= Post::orderBy('created_at', 'desc')->get();

        return view('adminindex', compact('posts'));

    }

    //Show a specific post
    public function show($id){

        $posts= Post::find($id);

        return view('show',compact('posts'));
    }

    //Delete a post
    public function delete($id){

        $posts= Post::find($id);
        try {
            $posts->delete();
        } catch (\Exception $e) {
        }

        return redirect()->route('adminHome');
    }

    //Create new post view
    public function create(){

        $posts= Post::all();

        return view('create', compact('posts'));
    }

    //Edit post view
    public function edit($id){

        $posts= Post::find($id);

        return view('edit', compact('posts'));

    }

    //update a post
    public function update(Request $request, $id){

        $posts = Post::find($id);

        //If a new image is uploaded
        if ($request->hasFile('picture')){
            //stores upload information about image in variable
            $image= $request->file('picture');

            //Gets the original filename
            $fileName = $image->getClientOriginalName('picture');

            //Stores image to public storage with original filename
            $image->storeAs('public/full_size_images', $fileName);
            $image->storeAs('public/thumbnails', $fileName);

            //Resize image here
            $thumbnailpath = public_path('public/thumbnails/'.$fileName);
            $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($thumbnailpath);

        } else {

            $fileName = $posts->picture;

        }

        //Stores inputs from form to database
        $posts->title = request('title');
        $posts->category = request('category');
        $posts->picture = $fileName;
        $posts->estimated_time = request('estimated_time');
        $posts->ingredients_title_1 = request('ingredients_title_1');
        $posts->ingredients_1 = request('ingredients_1');
        $posts->ingredients_title_2 = request('ingredients_title_2');
        $posts->ingredients_2 = request('ingredients_2');
        $posts->description = request('description');
        $posts->temperature = request('temperature');
        $posts->timer = request('timer');

        //Form validation
        $this->validate(request(),[

            'title' => 'required|max:100',
            'category'=>'required',
            'picture'=>'image',
            'estimated_time'=>'required|integer',
            'ingredients_title_1'=>'nullable|max:200',
            'ingredients_1'=>'required|max:1000',
            'ingredients_title_2'=>'nullable|max:200',
            'ingredients_2'=>'nullable|max:1000',
            'description'=>'required|min:20',
            'temperature'=>'nullable|integer|max:1000',
            'timer'=>'nullable|integer|max:1000'
        ]);

        //updates row in table
        $posts->update();

        return redirect()->route('adminHome');

    }

    //Create new post
    public function store(Request $request) {

        $posts = new Post;

        //stores upload information about image in variable
        $image= $request->file('picture');

        //Gets the original filename
        $fileName = $image->getClientOriginalName('picture');

        //Stores image to public storage with original filename
        $image->storeAs('public/full_size_images', $fileName);
        $image->storeAs('public/thumbnails', $fileName);

        //Resize image here
        $thumbnailpath = public_path('public/thumbnails/'.$fileName);
        $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($thumbnailpath);

        //Stores inputs from form to database
        $posts->title = request('title');
        $posts->category = request('category');
        $posts->picture = $fileName;
        $posts->estimated_time = request('estimated_time');
        $posts->ingredients_title_1 = request('ingredients_title_1');
        $posts->ingredients_1 = request('ingredients_1');
        $posts->ingredients_title_2 = request('ingredients_title_2');
        $posts->ingredients_2 = request('ingredients_2');
        $posts->description = request('description');
        $posts->temperature = request('temperature');
        $posts->timer = request('timer');

        //Form validation
        $this->validate(request(),[

            'title' => 'required|max:100',
            'category'=>'required',
            'picture'=>'required|image',
            'estimated_time'=>'required|integer',
            'ingredients_title_1'=>'nullable|max:200',
            'ingredients_1'=>'required|max:1000',
            'ingredients_title_2'=>'nullable|max:200',
            'ingredients_2'=>'nullable|max:1000',
            'description'=>'required|min:20',
            'temperature'=>'nullable|integer|max:1000',
            'timer'=>'nullable|integer|max:1000'
        ]);

        $posts->save();
        $posts= Post::orderBy('created_at', 'desc')->get();

        return view('adminindex', compact('posts'));

    }
}
