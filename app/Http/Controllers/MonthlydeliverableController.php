<?php

namespace App\Http\Controllers;

use App\Models\monthlydeliverable;
use App\Models\User;
use Illuminate\Http\Request;

class MonthlydeliverableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        return view('monthlydeliverable.allpost', ['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        // maybe
        $this->authorize('update', $user->profile);

        //
        return view('monthlydeliverable.addpost');
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
            'pdffile' => 'required|mimes:pdf|max:4024 ',
            'Content' => 'required',

        ]);




        $imgpath= request('pdffile')->store('uploads/pdf', 'public');


        auth()->user()->monthlydeliverable()->create([

        'Title' => $data['Title'],
        'pdffile' => 'storage/'.$imgpath,
        'Content' => $data['Content'],

        ]);


        return redirect('/' . auth()->user()->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\monthlydeliverable  $monthlydeliverable
     * @return \Illuminate\Http\Response
     */
    public function show(monthlydeliverable $monthlydeliverable, $user, $pg)
    {
        //
        $user=User::find($user);

        //return view('PageContent',['user'=>$user],['pg'=>$pg]);

        $pg = monthlydeliverable::where('id', $pg)->firstOrFail();

        return view('monthlydeliverable.postop', ['pg'=>$pg], ['user'=>$user]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monthlydeliverable  $monthlydeliverable
     * @return \Illuminate\Http\Response
     */
    public function edit(monthlydeliverable $monthlydeliverable, User $user, $pg)
    {
        //


        $this->authorize('update', $user->profile);


        $pg = monthlydeliverable::where('id', $pg, $user)->firstOrFail();

        return view('monthlydeliverable.edit', compact('user', 'pg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monthlydeliverable  $monthlydeliverable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, monthlydeliverable $monthlydeliverable, User $user, $pg)
    {
        //

        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'Title' => 'required',

            'Content' => 'required',
        ]);


        $stock = monthlydeliverable::find($pg);

        $stock->Title =  $request->get('Title');

        $stock->Content = $request->get('Content');

        $stock->update();
        return redirect('/' . auth()->user()->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monthlydeliverable  $monthlydeliverable
     * @return \Illuminate\Http\Response
     */
    public function destroy(monthlydeliverable $monthlydeliverable, User $user, $pg)
    {
        //

        $this->authorize('update', $user->profile);

        $del = $monthlydeliverable::find($pg);

        $del->delete();
        return redirect('/' . auth()->user()->id);

    }
}
