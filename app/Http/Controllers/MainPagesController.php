<?php

namespace App\Http\Controllers;

use App\Models\Main_Pages;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, profile $profile)
    {


        if ((Auth::user()->id)!=1) {


            if ((Auth::user()->id)!=($user->profile->belongt->id)) {


                $this->authorize('update', $user->profile);



            }


        }

        // dd($user2=User::find($user));


        // echo Auth::user()->id ;

        // old (   $user=User::find($user);        )




        $user=User::find($user->id);

        if ($user == null) {
            abort(404);

        } else {


            return view('db', ['user'=>$user , 'profile'=>$profile]);

        }


    }

    public function user(User $user)
    {

        $user = Auth::user();


        return view('db', ['user'=> $user]);

    }

    public function srch()
    {

        $ar=User::all();

        return view('StructuralSearch', ['ar'=>$ar]);

    }

    public function ve()
    {

        return view('CURD.ve');

    }

    public function PageContent($user, $pg)
    {


        $user=User::find($user);

        //return view('PageContent',['user'=>$user],['pg'=>$pg]);

        $pg = Main_Pages::where('id', $pg)->firstOrFail();

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
        //
        $data = request()->validate([

            'Title' => 'required',
            'Content' => 'required',


        ]);

        auth()->user()->mainpages()->create([

        'Title' => $data['Title'],
        'Content' => $data['Content'],

        ]);
        return redirect('/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main_Pages  $main_Pages
     * @return \Illuminate\Http\Response
     */
    public function show(Main_Pages $main_Pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main_Pages  $main_Pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Main_Pages $main_Pages, User $user, $pg)
    {

        $this->authorize('update', $user->profile);


        $pg = Main_Pages::where('id', $pg)->firstOrFail();
        return view('CURD.edit', compact('user', 'pg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main_Pages  $main_Pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main_Pages $main_Pages, User $user, $pg)
    {
        $data = request()->validate([

            'Title' => 'required',
            'Content' => 'required',
        ]);


        $stock = Main_Pages::find($pg);

        $stock->Title =  $request->get('Title');
        $stock->Content = $request->get('Content');

        $stock->update();
        return redirect('/' . auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main_Pages  $main_Pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main_Pages $main_Pages, User $user, $pg)
    {
        //
        $this->authorize('update', $user->profile);

        $del = $main_Pages::find($pg);

        $del->delete();
        return redirect('/' . auth()->user()->id);



    }
}
