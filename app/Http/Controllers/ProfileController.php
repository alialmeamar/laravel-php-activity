<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use App\Models\contactinfo;

use Illuminate\Http\Request;

class ProfileController extends Controller
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
        //
        $data = request()->validate([

            'name' => 'required',
            'describe' => 'required',
            'user_id' => 'required',
            'total_staff' => 'required',
            'current_staff' => 'required',


        ]);

        auth()->user()->profile()->create([

        'name' => $data['name'],
        'describe' => $data['describe'],
        'user_id' => $data['user_id'],
        'belongto' => $data['belongto'],
        'total_staff' => $data['total_staff'],
        'current_staff' => $data['current_staff'],


        ]);
        return redirect('/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile, User $user)
    {

        $ar=User::all();



        //
        $this->authorize('update', $user->profile);
        //  $pg = profile::where('user_id', $user)->firstOrFail();
        return view('profile.edit', ['user'=>$user , 'ar'=>$ar , ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile, User $user)
    {
        //


        $this->authorize('update', $user->profile);
        $data = request()->validate([

            'name' => 'required',
            'describe' =>  'required',
            'belongto' => 'required',
            'total_staff' => 'required',
            'current_staff' => 'required',
        ]);



        $stock = profile::find($user->id);


        auth()->user()->profile->update($data);
        return redirect('/' . auth()->user()->id);
    }

    public function getprofile(Request $request, profile $profile, User $user)
    {
        $stock = contactinfo::all();
        return  response()->json($stock);

    }

    public function contact(Request $request, profile $profile, contactinfo $contactinfo, User $user)
    {
        //


        $this->authorize('update', $user->profile);

        $data = request()->validate([



            'mobilenum' =>  'required',
            'phonenum' =>  'required',
            'websitepg' =>  'required',
            'facebookpg' =>  'required',
            'instagrampg' =>  'required',
            'youtubepg' =>  'required',
            'twitterpg' =>  'required',
            'telegrampg' =>  'required',
            'tiktokpg' =>  'required',

        ]);

        // dd($data);


        $stock = contactinfo::find($user->id);


        auth()->user()->contactinfo->update($data);
        return redirect('/' . auth()->user()->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
