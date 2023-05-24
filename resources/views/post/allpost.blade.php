<link rel="stylesheet" href="/css/loading.css">

        @extends('layouts.app')

        @section('content')

        @if (!empty($user->post))
    <div class="container p-5">
        <div class="row">

            @foreach ($user->post as $p)
            <div class="col-xl-3 col-lg-4 col-md-6 col-xsm-12">
            <a href="/{{$user->id}}/p/{{$p->id}}" class="btt">
                <div class="therdcard">
                    <div class="card-body">
                        <div id="overflow">
                            <img class="card-img-top cap2 " src="/{{$p->image}}" alt="Card image cap ">
                        </div>
                        <h5 class="card-title">

                            {{$p->Title}}

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
