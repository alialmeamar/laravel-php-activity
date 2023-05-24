<link rel="stylesheet" href="/css/loading.css">

@extends('layouts.app')

@section('content')
 

<div class="rside d-none d-lg-block  ">
            <div class="rlogo">
                <a href="index.html">
                    <span class="container material-symbols-outlined">
                        token
                    </span>
                </a>
            </div>
            <div class="rbtn">
                <span class="material-symbols-outlined"> Account_Tree </span>التشكيلات
            </div>
            <div class="rbtn">
                <span class="material-symbols-outlined"> Article </span> الصفحات
            </div>
            <div class="rbtn">
                <span class="material-symbols-outlined"> Account_Box </span> السيرة الذاتية للمدير
            </div>
            <div class="rbtn">
                <span class="material-symbols-outlined"> Corporate_Fare </span>الهيكل التنضيمي
            </div>
            <div class="rbtn">
                <span class="material-symbols-outlined"> Event </span>النشاطات اليومية
            </div>
            <div class="rbtn">
                <span class="material-symbols-outlined"> Calendar_Month </span>المنجر الشهري
            </div>

            <div class="rbtn rbtn_s">
                <span class="material-symbols-outlined">Tune</span>
            </div>
            <div class="rbtn rbtn_s">
                <span class="material-symbols-outlined"> 
                    
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logoutt') }}
                                    </a>
                                    </span>
            </div>

        </div>
@endsection


