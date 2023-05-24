<!DOCTYPE html>

<link rel="stylesheet" href="/css/loading.css">

@extends('layouts.app')

@section('content')
    <style>
        .container {
            direction: RTL;
            text-align: justify;
        }
    </style>

    <div class=" d-flex ">
        <div class="rside" id="rside">
            <div class="rlogo">
                <a href="/">
                    <img src="/img/1x/logoc.png" alt="" class="w-75 pt-5 pb-3"> <br>
                </a>
                @if (!empty($user->profile))
                    {{ $user->profile->name }}
                @endif
                <br>

            </div>
            <a href="/{{ $user->id }}">
                <div class="rbtn">
                    <span class="material-symbols-outlined"> home </span>الرئيسية
                </div>
            </a>
            <!--
                <div class="rbtn">
                    <span class="material-symbols-outlined"> Visibility </span>الرؤية
                </div>
                <div class="rbtn">
                    <span class="material-symbols-outlined"> Comment </span>الرسالة
                </div>
                <div class="rbtn">
                    <span class="material-symbols-outlined"> Ads_Click </span>الأهداف الاستتراتيجة
                </div>
                <div class="rbtn">
                    <span class="material-symbols-outlined"> Track_Changes </span>الأهداف التنضيمية
                </div>

            -->
            @if (!empty($user->mainpages))
                @foreach ($user->mainpages as $a)
                    <a href="/{{ $user->id }}/m/{{ $a->id }}">
                        <div class="rbtn">
                            <span class="material-symbols-outlined"> Feed </span> {{ $a->Title }}
                        </div>
                    </a>
                @endforeach
            @else
                {{ 'لم يتم اضافة نشاطات' }}

            @endif

            <!-- add page -->




            @can('update', $user->profile)
                <a href="/{{ $user->id }}/mp/amp">
                    <div class="rbtn ">
                        <span class="material-symbols-outlined">Add_Box</span> اضافة صحفة
                    </div>
                </a>
            @endcan

            <button type="button" class=" btn btn-sm  rbtn rbtn_s text-light    " onclick="darklight()"> <span
                    class="material-symbols-outlined">Dark_Mode</span> </button>
            <hr>

            <?php
            use App\Models\profile;

            $profile = profile::all()
                ->where('belongto', $user->id)
                ->where('user_id', '!=', $user->id)
                ->sortBy('user_id');
            ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    التشكيلات التابعة
                </button>
                <ul class="dropdown-menu">
                    @foreach ($profile as $prf)
                        <li><a class="dropdown-item p-2 w-100" href="/{{ $prf->user_id }}"> {{ $prf->name }} :
                                {{ $prf->user_id }} </a></li>
                    @endforeach


                </ul>
            </div>





            <!-- add page -->
            <hr>
            @if (Route::has('login'))
                @auth
                    {{ Auth::user()->name }}
                @endif
                @endif
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            @can('update', $user->profile)
                                <div class="rbtn rbtn_s">
                                    <a href=" {{ $user->id }}/profile/edit "> <span
                                            class="material-symbols-outlined">Tune</span></a>
                                </div>
                            @endcan
                            <div class="rbtn rbtn_s">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <span class="material-symbols-outlined">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="rbtn rbtn_s">
                                <a href="{{ route('login') }}"> <span class="material-symbols-outlined">Login</span></a>
                            </div>

                            @if (Route::has('register'))
                                <div class="rbtn rbtn_s">
                                    <a href="{{ route('register') }}"> <span
                                            class="material-symbols-outlined">App_Registration</span></a>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endif



            </div>

            <div class="rside_sm d-block d-lg-none  ">
                <div class="rlogo_sm">
                    <a href="index.html">
                        <span class="container material-symbols-outlined">
                            token
                        </span>
                    </a>
                </div>
                <div class="rbtn rbtn_s">
                    <span class="material-symbols-outlined"> home </span>
                </div> <br>
                <div class="rbtn rbtn_s">
                    <span class="material-symbols-outlined"> Visibility </span>
                </div> <br>
                <div class="rbtn rbtn_s">
                    <span class="material-symbols-outlined"> Comment </span>
                </div> <br>
                <div class="rbtn rbtn_s">
                    <span class="material-symbols-outlined"> Ads_Click </span>
                </div> <br>
                <div class="rbtn rbtn_s">
                    <span class="material-symbols-outlined"> Track_Changes </span>
                </div>

                <hr>

                <div class="rbtn rbtn_s">
                    <a href="control.html"> <span class="material-symbols-outlined">Tune</span></a>
                </div>
                <br>
                <div class="rbtn rbtn_s">
                    <span class="material-symbols-outlined"> Logout </span>
                </div>

            </div>

            <div class="container-fluid   m_0   ">
                <div class="pagecont   ov  p-5">
                    <br>
                    <h1> {{ $pg->Title }}</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-right" dir="rtl">
                            <div class="taqs ">
                                ID: {{ $pg->id }}
                            </div>
                            <div class="taqs ">
                                تاريخ الاضافة : {{ $pg->updated_at->format('d-m-Y') }}
                            </div>
                            <div class="taqs ">
                                اخر تعديل : {{ $pg->created_at->format('D-M-Y') }}
                            </div>
                        </div>
                        <div class="col-6 text-left" dir="ltr">
                            @can('update', $user->profile)
                                <div class="taqs  bg-danger text-white"> <a href="{{ $pg->id }}/d"> حذف </a> </div>
                                <div class="taqs bg-success colo text-white "> <a href="{{ $pg->id }}/u">تعديل</a> </div>
                            @endcan


                        </div>
                        <br>
                    </div>
                    <hr>
<div class="alart">
    <h1>
        <?php
 ///حساب عدد ايام المنشور

use Carbon\Carbon;

// Get the creation date of the post
$creationDate = Carbon::parse($pg->updated_at);

// Get the current date
$currentDate = Carbon::now();

// Calculate the difference in days between the creation date and current date
$daysDifference = $creationDate->diffInDays($currentDate);

// Compare the difference in days with 7 (1 week)
if ($daysDifference >= 7) {
    echo "قديم";
} else {

    $current = Carbon::now();
echo $current ;
    echo "جديد";
}
            ?>
    </h1>


</div>

                    <p></p>
                    <div class="container mainspace text-center" id="textread">
                        <div id="textread">
                            <img class="card-img-top    w-50" src="/{{$pg->image}}" alt="Card image cap ">
                            {!! $pg->Content !!}

                        </div>
                    </div>



                </div>
            </div>

                    </html>
