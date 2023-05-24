<link rel="stylesheet" href="/css/loading.css">

        @extends('layouts.app')

        @section('content')
        <div class="container p-5   ">
        @can('update', $user->profile)
        <a href="/{{$user->id}}/md/addpost">
        <div class="text-center addmonthlyactivity">
            <span class="material-symbols-outlined p-1" style=" vertical-align: middle;">
                <h1> post_add </h1>
            </span>

                <h4 class="d-inline"> اضافة نشاط </h4>
            </div>
        </a>

        @endcan
    </div >

        @if (!empty($user->monthlydeliverable))
    <div class="container p-5">


        <div class="row ">

            @foreach ($user->monthlydeliverable->reverse() as $p)
            <div class="col-10 mt-2   ">

            <a href="/{{$user->id}}/md/{{$p->id}}" class="btt">
                <div class="therdcard  ">
                    <div class="card-body ">

                        {{-- <div id="overflow"> --}}
                            {{-- <img class="card-img-top cap2 " src="/{{$p->pdffile}}" alt="Card image cap "> --}}
                        {{-- </div> --}}
                        <h5 class=" ">

                            {{$p->Title}}


                        </h5>
                    </div>
                </div>
            </a>

            </div>
            <div class="col-2 mt-2 ">

                <a href=" /{{$p->pdffile}}" class="btt">
                    <div class="therdcard  ">
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

        @endforeach
        @else
        {{ 'لم يتم اضافة نشاطات' }}

        @endif


    </div>
    </div>
