<link rel="stylesheet" href="/css/loading.css">

@extends('layouts.app')

@section('content')
<style>


  .container{
    direction: RTL;
    text-align: justify;
  }


  </style>

<div class=" d-flex">
  <div class="rside d-none d-lg-block  ">
    <div class="rlogo">
        <a href="/">
            <img src="/../img/1x/logoc.png" alt="" class="w-75 pt-5 pb-3"> <br>
        </a>
        @if (!empty($user->profile))
            {{ $user->profile->name }}
        @endif
        <br>

    </div>
      <a href="/{{$user->id}}">
      <div class="rbtn">
        <span class="material-symbols-outlined"> home </span>الرئيسية
      </div>
    </a>
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
      @if (!empty($user->mainpages))
          @foreach ($user->mainpages as $a)
              <a href="{{ $a->id }}">
                  <div class="rbtn">
                      <span class="material-symbols-outlined"> Feed </span> {{ $a->Title }}
                  </div>
              </a>
          @endforeach
      @else
          {{ 'لم يتم اضافة نشاطات' }}

      @endif
      <hr>


      @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              @auth
                  <div class="rbtn rbtn_s">
                      <a href="{{ url('/')}}"><span class="material-symbols-outlined">Tune</span></a>
                  </div>
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
                      <a href="{{ route('login') }}"> <span class="material-symbols-outlined">Tune</span></a>
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

    <div class="container p-5 text-right">

 <br>
 <h1>  {{$pg->Title}}</h1>
 <hr>
 <div class="taqs ">
  ID: {{$pg->id}}
</div>
<div class="taqs ">
  Date Created : {{$pg->updated_at->format('d-m-Y')}}
</div>
<div class="taqs ">
  Date UpDated : {{$pg->created_at->format('D-M-Y')}}
</div>
<br>
   <hr>
    <div class="text-center">
<div class="row">
        <div class="  mt-2 ">

            <a href=" /{{$pg->pdffile}}" class="btt">
                <div class="   ">
                    <div class="card-body ">

                        {{-- <div id="overflow"> --}}
                            {{-- <img class="card-img-top cap2 " src="/{{$p->pdffile}}" alt="Card image cap "> --}}
                        {{-- </div> --}}
                        <h5 class="card-title text-center">

                            <img  class="pdficon" src="/../img/pdficon.png">
                            <br>

                       <h6 class="text-center"> تحميل   </h6>


                        </h5>
                    </div>
                </div>
            </a>

            </div>

        </div >
     </div>

   <p></p>
   <div class="container mainspace text-center" id="textread">
    <div id="textread">
       {!! $pg->Content !!}
    </div>
   </div>
   <hr>
   @can('update', $user->profile)
   <a href="{{$pg->id}}/d">Delete</a>
   <br> <br>
   <a href="{{$pg->id}}/u">Edit</a>

   </div>
   @endcan

   <hr>
