<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('user_infos.user_id');

        // $posts = Post::whereIn("user_id", $users)->latest()->paginate(5);
        //to get all user post at once
        $posts = Post::whereIn("user_id", $users)->with('user')->latest()->paginate(5);

        // dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/${imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        // \App\Models\Post::create($data);

        // dd(request()->all());
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        //compact('post')
        return view('posts.show', compact('post'));
    }
}
