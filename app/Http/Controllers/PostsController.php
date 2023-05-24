<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {


        return view('post.allpost', ['user'=>$user]);

    }

 public function app(User $user)
 {
     $this->authorize('update', $user->profile);
     $data=Posts::all();

     return  response()->json($data, 200);

 }

    public function PageContent($user, $pg)
    {

        $user=User::find($user);

        //return view('PageContent',['user'=>$user],['pg'=>$pg]);

        $pg = Posts::where('id', $pg)->firstOrFail();

        return view('PageContent', ['pg'=>$pg], ['user'=>$user]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('CURD.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        $this->authorize('update', $user->profile);


        $data = request()->validate([

            'Title' => 'required',
            'image' => 'required|image',
            'Content' => 'required',

        ]);

        $imgpath= request('image')->store('uploads', 'public');
        auth()->user()->post()->create([

        'Title' => $data['Title'],
        'image' => 'storage/'.$imgpath,
        'Content' => $data['Content'],

        ]);
        return redirect('/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts, $user, $pg)
    {

        $user=User::find($user);

        //return view('PageContent',['user'=>$user],['pg'=>$pg]);

        $pg = Posts::where('id', $pg)->firstOrFail();

        return view('post.postop', ['pg'=>$pg], ['user'=>$user]);


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts, User $user, $pg)
    {
        $this->authorize('update', $user->profile);


        $pg = Posts::where('id', $pg)->firstOrFail();
        return view('post.edit', compact('user', 'pg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts, User $user, $pg)
    {
        //
        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'Title' => 'required',

            'Content' => 'required',
        ]);


        $stock = Posts::find($pg);

        $stock->Title =  $request->get('Title');

        $stock->Content = $request->get('Content');

        $stock->update();
        return redirect('/' . auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts, User $user, $pg)
    {
        $this->authorize('update', $user->profile);

        $del = $posts::find($pg);

        $del->delete();
        return redirect('/' . auth()->user()->id);

        //

    }
}
