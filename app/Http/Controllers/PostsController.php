<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
//        $randomProfiles = Profile::inRandomOrder()->take(3)->get();

        $user = auth()->user();

        if (!$user) {
            return view('index');
        }

        $randomProfiles = Cache::remember(
            'random.profiles.' . $user->id,
            now()->addHour(),
            function () use ($user) {
                return Profile::inRandomOrder()->take(3)->get();
            });

        $followedUsers = $user->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $followedUsers)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts', 'randomProfiles'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        // dd($imagePath);

        $image = Image::make(request('image')->getRealPath())->fit(1200, 1200);
        $image->stream();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        $likesPost = (auth()->user()) ? auth()->user()->likes->contains($post->id) : false;

        return view('posts.show', compact('post', 'likesPost'));
    }
}
