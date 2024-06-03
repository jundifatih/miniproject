<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function formPost(){
        return view('post.add');
    }

    public function formAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|max:2048',
            'description' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->route('form_post')
                ->withErrors($validator)
                ->withInput();
        }

        $posts = Post::create([
            'user_id' => Auth::user()->id,
            'image' => $request->image,
            'description' => $request->description,
        ]);


        if ($posts) {
            return redirect()->route('home')->with('success', 'post created successfully');
        } else {
            return redirect()->route('form_post')->with('error', 'Failed to create Post');
        }
    }

    public function seePost(){
        $posts = Post::find(Auth::user()->id);
        return view('seepost.index', compact('posts'));
    }

}
