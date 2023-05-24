<link rel="stylesheet" href="/css/loading.css">
<link rel="stylesheet" href="/css/stsrcj.css">

@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <div class="rbtn rbtn_s2">
                    <a href="/home"> <span class="material-symbols-outlined">Home </span> الرئيسية </a>
                </div>
                <div class="rbtn rbtn_s2">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <span class="material-symbols-outlined">Logout</span> خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @else
                <div class="rbtn rbtn_s2"> دخول
                    <a href="{{ route('login') }}"> <span class="material-symbols-outlined">Tune</span> </a>
                </div>

                @if (Route::has('register'))
                    <div class="rbtn rbtn_s2"> تسجيل
                        <a href="{{ route('register') }}"> <span class="material-symbols-outlined">App_Registration</span></a>
                    </div>
                @endif
            @endauth
        </div>
    @endif


    <?php
    use App\Models\profile;
    use App\Models\User;
    $user = Auth::user();
    if (Auth::user() != null) {
        $profile = profile::all()
            ->where('belongto', $user->id)
            ->where('user_id', '!=', $user->id)
            ->sortBy('user_id');
    }
    // dd($profile);
    ?>


    @if (Auth::user() == null)
        <div class="container mainspace text-center p-5">
            <a href='login'> يرجى تسجيل الدخول<a />
        </div>
    @else
        <div class="container text-center">

            <img src="img/logo.png" alt="">
        </div>
        <div class="container mainspace text-center p-5">
            <h3> اختر صفحة التشكيل المطلوب من القائمة ادناه </h3>

            <br> <br>




            <?php
            // echo Auth::user()->name;
            $loginuser = Auth::user()->id;
            
            if ($loginuser == 1) {
                $profile = profile::all();
            }
            
            ?>

            <select class="form-select form-select-lg mb-3 " id="selector">
                <option value=""> اختر من القائمة</option>
                <option value="{{ $user->id }}"> {{ $user->id }} : {{ $user->name }} </option>
                @foreach ($profile as $ar)
                    <option value=" {{ $ar->id }}"> {{ $ar->name }}</option>
                @endforeach

            </select>




    @endif



    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <script>
        $(function() {
            // bind change event to select
            $('#selector').on('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>
