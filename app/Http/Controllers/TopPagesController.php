<?php

namespace App\Http\Controllers;
use App\Models\TopPages;
use Illuminate\Http\Request;
use App\Models\User;
class TopPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function PageContent($user,$pg)
    {

      $user=User::find($user);

       //return view('PageContent',['user'=>$user],['pg'=>$pg]);

       $pg = TopPages::where('id', $pg)->firstOrFail();

       return view('PageContent',['pg'=>$pg],['user'=>$user]   );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('update',$user->profile);

        //
        $data = request()->validate([

            'Title' => 'required',
            'Content' => 'required',


        ]);

         auth()->user()->toppages()->create([

         'Title' => $data['Title'],
         'Content' => $data['Content'],

        ]);
        return redirect('/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopPages  $topPages
     * @return \Illuminate\Http\Response
     */
    public function show(TopPages $topPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopPages  $topPages
     * @return \Illuminate\Http\Response
     */
    public function edit(TopPages $topPages ,  User $user ,$pg)
    {

        //
        $this->authorize('update',$user->profile);


        $pg = TopPages::where('id', $pg)->firstOrFail();
         return view('CURD.edit', compact('user','pg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopPages  $topPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopPages $topPages, User $user , $pg)
    {
        $this->authorize('update',$user->profile);

        //
        $data = request()->validate([

            'Title' => 'required',
            'Content' => 'required',
        ]);


        $stock = TopPages::find($pg);

    $stock->Title =  $request->get('Title');
    $stock->Content = $request->get('Content');

    $stock->update();
    return redirect('/' . auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopPages  $topPages
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopPages $topPages , User $user , $pg)
    {
        //
        $this->authorize('update',$user->profile);

        $del = $topPages::find($pg);

        $del->delete();
        return redirect('/' . auth()->user()->id);
    }


    public function uploadimg(TopPages $topPages, Request $request , User $user)
    {
       //$this->authorize('update',$user->profile);

       $imgpath= request()->file('file')->store('uploads', 'public');


       return response()->json(['location'=>"/storage/$imgpath"]);
       /// return view('CURD.edit', compact('user','pg'));
      /// return view('welcome');
    }
}
