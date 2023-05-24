<link rel="stylesheet" href="/css/loading.css">

@extends('layouts.app')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<div class="downmen" id="rsidee">
    <div class="circle">
        <!---- زر القائمة --->
        <button type="button" class="btn btn-outline-success m-2" onclick="openNav()">&#9776;</button>
        <!---- زر القائمة --->
        <span class="material-symbols-outlined midelhomeicon">
            home
        </span>

        <!---- زر القائمة --->
        <button type="button" class="btn btn-outline-success m-2 rbtn_s " onclick="darklight()"> <span
                class="material-symbols-outlined">Dark_Mode</span> </button>
    </div>

</div>
@section('content')
    <div class="ldshow">
        <div class=" d-flex ldshow">
            <div class="rside" id="rside">
                <div class="rlogo">
                    <a href="/">
                        <img src="img/1x/logoc.png" alt="" class="w-75 pt-5 pb-3"> <br>
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
                        <a href="{{ $user->id }}/m/{{ $a->id }}">
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
                    <a href="{{ $user->id }}/mp/amp">
                        <div class="rbtn ">
                            <span class="material-symbols-outlined">Add_Box</span> اضافة صحفة
                        </div>
                    </a>
                @endcan

                <button type="button" class=" btn btn-sm  rbtn rbtn_s text-light  bg_green   " onclick="darklight()"> <span
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

                    <button class="btn  bg_green dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        التشكيلات التابعة

                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($profile as $prf)
                            <li> <a href="../{{ $prf->user_id }}"> <button class="dropdown-item   "
                                        href="../{{ $prf->user_id }}"> {{ $prf->name }} : {{ $prf->user_id }} </button>
                                </a></li>
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


                <div class="mainside container-fluid ">
                    <div class="  topwidecard1  ">
                        <div class="col-12   ">
                            <div class=" justify-content-center align-self-center">

                                <div class="  d-flex h-100">
                                    <div class="align-self-center">
                                        @if (!empty($user->profile))
                                            <h1>
                                                {{ $user->profile->name }}
                                            </h1>
                                            {!! $user->profile->describe !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-xsm-12">

                            <a
                                href="{{ $user->id }}/t/@if (!empty($user->toppages[0])) {{ $user->toppages[0]->id }} @endif">
                                <div class="seccards align-middle pt-2">
                                    <div class="hoverinfo0">
                                        <div class="hoverinfo">
                                            <span class="material-symbols-outlined">
                                                info
                                            </span>
                                        </div>
                                        <div class="popmsg"> اخر تحديث : {{ $user->toppages[0]->updated_at }}</div>
                                    </div>
                                    <img class=" card-img h-75 w-auto " src="img/icon/4300445.png" alt="">

                                    <br>

                                    <p class="p-1">
                                        @if (!empty($user->toppages[0]))
                                            {{ $user->toppages[0]->Title }}
                                        @else
                                            {{ 'لم يتم الاضافة ' }}

                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-xsm-12">
                            <a
                                href="{{ $user->id }}/t/@if (!empty($user->toppages[0])) {{ $user->toppages[1]->id }} @endif">
                                <div class="seccards align-middle pt-2">
                                    <div class="hoverinfo0">
                                        <div class="hoverinfo">
                                            <span class="material-symbols-outlined">
                                                info
                                            </span>
                                        </div>
                                        <div class="popmsg"> اخر تحديث : {{ $user->toppages[1]->updated_at }}</div>
                                    </div>
                                    <img class=" card-img h-75 w-auto    " src="img/icon/3314812.png" alt="">
                                    <br>
                                    <p class="p-1">
                                        @if (!empty($user->toppages[1]))
                                            {{ $user->toppages[1]->Title }}
                                        @else
                                            {{ 'لم يتم الاضافة ' }}

                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                        <a
                            href="{{ $user->id }}/t/@if (!empty($user->toppages[0])) {{ $user->toppages[2]->id }} @endif">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-xsm-12">
                                <div class="seccards align-middle pt-2 ">
                                    <div class="hoverinfo0">
                                        <div class="hoverinfo">
                                            <span class="material-symbols-outlined">
                                                info
                                            </span>
                                        </div>
                                        <div class="popmsg"> اخر تحديث : {{ $user->toppages[2]->updated_at }}</div>
                                    </div>
                                    <img class=" card-img h-75 w-auto    " src="img/icon/1647089.png" alt="">
                                    <br>
                                    <p class="p-1">
                                        @if (!empty($user->toppages[2]))
                                            {{ $user->toppages[2]->Title }}
                                        @else
                                            {{ 'لم يتم الاضافة ' }}

                                        @endif
                                    </p>

                                </div>
                        </a>

                    </div>
                    <a href="{{ $user->id }}/md/all">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-xsm-12">
                            <div class="seccards align-middle pt-2 ">
                                <div class="hoverinfo0">
                                    <div class="hoverinfo">
                                        <span class="material-symbols-outlined">
                                            info
                                        </span>
                                    </div>
                                    <div class="popmsg"> اخر تحديث : {{ $user->toppages[3]->updated_at }}</div>
                                </div>
                                <img class=" card-img h-75 w-auto    " src="img/icon/7613444.png" alt="">
                                <br>
                                <p class="p-1">
                                    @if (!empty($user->toppages[3]))
                                        {{ $user->toppages[3]->Title }}
                                    @else
                                        {{ 'لم يتم الاضافة ' }}

                                    @endif
                                </p>
                            </div>
                    </a>
                </div>
                <hr>
                <div class="row   p-0 m-0">
                    <div class="  col-md-2   ">
                        <div class="topstatic justify-content-center align-self-center">
                            <h6 class="  text-center">
                                <br>
                                الملاك الكلي
                                <br>
                                <h1 class="text-center">

                                    {{ $user->profile->total_staff }}
                                </h1>
                            </h6>
                        </div>
                        <div class="topstatic justify-content-center align-self-center">
                            <h6 class="  text-center">
                                <br>
                                الملاك الحالي
                                <h1 class="text-center">
                                    {{ $user->profile->current_staff }}
                                </h1>
                            </h6>
                        </div>

                    </div>
                    <div class="col-md-2 text-center ">
                        <div class="topstatic2 justify-content-center align-self-center">
                            <h6 class="  text-center">
                                <br>
                                نسبة اكتمال الملاك

                                <?php
                                
                                $xx = floatval($user->profile->total_staff);
                                $xy = floatval($user->profile->current_staff);
                                
                                $xx1 = ($xx - $xy) / $xx; /* الكلي */
                                $xy1 = $xy / $xx; /* الفعلي */
                                
                                ?>

                                <div class="chartjs">

                                    <canvas id="myChartpi" class=" d-block  p-3     "></canvas>
                                </div>
                                <script>
                                    new Chart("myChartpi", {
                                        type: "pie",
                                        data: {
                                            labels: [
                                                'النقص بالملاك ',
                                                'الملاك الفعلي',
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: [{{ $xx1 }}, {{ $xy1 }}],
                                                backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 205, 86)'
                                                ],
                                                hoverOffset: 4
                                            }]
                                        },
                                        options: {
                                            title: {
                                                display: true,
                                                text: " "
                                            }
                                        }
                                    });
                                </script>

                            </h6>
                        </div>


                    </div>

                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="topstatic2 justify-content-center align-self-center">
                            <h5 class="  text-center p-2">
                                مخطط النشاط

                                <div class="chartjs">
                                    <canvas id="myChart" class="   p-1 "></canvas>
                                </div>


                                <script>
                                    const ctx = document.getElementById('myChart');
                                    new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['1', '2', '3', '4', '5', '6'],
                                            datasets: [{
                                                label: 'عدد النشاطات ',
                                                data: [10, 12, 5, 12, 2, 3],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4 ">
                        <div class="topstatic2 justify-content-center align-self-center ">
                            <h5 class="  text-center pt-5">
                                <br>
                                صفحات التشكيل على الانترنت
                                <br> <br>
                                <?php $i = 0; ?>

                                <div class="   ">

                                    <!-------------->
                                    <?php
  if (strlen($user->contactinfo->websitepg) >3 ){
    $i++;
 ?>
                                    <!-------------->

                                    <a href="https://{{ $user->contactinfo->websitepg }}">

                                        <i class="m-2 fi fi-br-browser"></i>
                                    </a>
                                    <!-------------->

                                    <?php
} ;

  if (strlen($user->contactinfo->facebookpg) >3 ){
    $i++;
 ?>
                                    <!-------------->
                                    <a href="https://{{ $user->contactinfo->facebookpg }}">
                                        <i class="m-2 fi fi-brands-facebook"></i>
                                    </a>



                                    <!-------------->
                                    <?php

} ;
if (strlen($user->contactinfo->instagrampg) >3 ){
    $i++;
?>
                                    <!-------------->
                                    <a href="https://{{ $user->contactinfo->instagrampg }}">
                                        <i class="m-2 fi fi-brands-instagram"></i>
                                    </a>


                                    <!-------------->
                                    <?php } ;
if (strlen($user->contactinfo->youtubepg) >3 ){
    $i++;
?>
                                    <!-------------->
                                    <a href="https://{{ $user->contactinfo->youtubepg }}">
                                        <i class="m-2 fi fi-brands-youtube"></i>
                                    </a>

                                    <!-------------->
                                    <?php } ;
  if (strlen($user->contactinfo->twitterpg) >3 ){
    $i++;
 ?>
                                    <!-------------->
                                    <a href="https://{{ $user->contactinfo->twitterpg }}">
                                        <i class="m-2  fi fi-brands-twitter"></i>
                                    </a>

                                    <!-------------->
                                    <?php } ;
  if (strlen($user->contactinfo->telegrampg) >3 ){
    $i++;
 ?>
                                    <!-------------->


                                    <a href="https://{{ $user->contactinfo->telegrampg }}">
                                        <i class=" m-2  fi fi-brands-telegram"></i>
                                    </a>

                                    <!-------------->
                                    <?php } ;
  if (strlen($user->contactinfo->tiktokpg) >3 ){
    $i++;
 ?>
                                    <!-------------->
                                    <a href="https://{{ $user->contactinfo->tiktokpg }}">
                                        <i class="m-2  fi fi-brands-tik-tok"></i>
                                    </a>

                                </div>

                                <?php } ;
                                if ($i==0){
                                    echo "لم يتم اضافة صفحات";
                                }


                                ?>

                                <br> <br>
                                ارقام الاتصال
                                <br>
                                {{ $user->contactinfo->mobilenum }}
                                <br>
                                {{ $user->contactinfo->phonenum }}

                            </h5>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-center"> ____________ \\\ اخر النشاطات /// ____________ </p>
                <!-- /////////////////////////////////////////////////////////// -->
                @can('update', $user->profile)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-xsm-12">
                        <a href="{{ $user->id }}/p/addpost" class="btt">
                            <div class="therdcard">
                                <div class="card-body">
                                    <div class="topwidecard justify-content-center align-self-center">
                                        <h4 class="  text-center">
                                            <span class="material-symbols-outlined p-1">
                                                <h1> post_add </h1>
                                            </span>
                                            <br>
                                            اضافة منشور
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan
                <!-- /////////////////////////////////////////////////////////// -->

                @if (!empty($user->post))
                    @php($count = 0)
                    @can('update', $user->profile)
                        @php($count = 1)
                    @endcan

                    @foreach ($user->post->reverse() as $p)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-xsm-12">
                            <a href="/{{ $user->id }}/p/{{ $p->id }}" class="btt">
                                <div class="therdcard">
                                    <div class="card-body">
                                        <div id="overflow">

                                            <img class="card-img-top cap2 " src="{{ $p->image }}" alt="Card image cap ">
                                        </div>
                                        <h5 class="card-title">

                                            {{ $p->Title }}

                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @php(++$count)
                        @if ($count == 8)
                        @break
                    @endif
                @endforeach
            @else
                {{ 'لم يتم اضافة نشاطات' }}

            @endif



            <hr>
            <div class="text-center rbtn mb-4 w-25  "> <a href="{{ $user->id }}/p/all">
                    <span class="material-symbols-outlined">
                        pages
                    </span>
                    كافة النشاطات
                </a> </div>



            <!-- /////////////////////////////////////////////////////////// -->
            <hr>

        </div>

    </div>
