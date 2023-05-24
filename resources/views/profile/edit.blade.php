@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <link rel="stylesheet" href="/css/loading.css">

    <script src="https://cdn.tiny.cloud/1/mw372xxhthn3rylefl7v3oafbkdoucgek2vj49y85j7bs4he/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <body>
        <div class="container pt-5 h-100">

            <form class="row g-3" action="s" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="col-md-12">
                    <label for="name" class="form-label "> العنوان</label>
                    <input type="text" class="form-control" {{ $errors->has('Title') ? ' is-invalid' : '' }}"
                        id="name" name="name" value="{{ $user->profile->name }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <!---->



                <!---->

                <!---->

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="describe" name="describe">{{ $user->profile->describe }}</textarea>
                    @if ($errors->has('describe'))
                        <strong>{{ $errors->first('describe') }}</strong>
                    @endif
                    <label for="floatingTextarea2">Comments</label>
                </div>


                <?php $user->profile->belongto; ?>
                <?php
                use App\Models\User;
                $profile = User::all()->where('id', $user->profile->belongto);
                ?>
                @foreach ($profile as $prf)
                @endforeach
                @if ($errors->has('belongto'))
                    <strong>{{ $errors->first('belongto') }}</strong>
                @endif

                <!------------------>
                <div class="container     text-right">
                    التشكيل التابع له
                    <select class="form-select " id="selector" name="belongto">
                        <option value="{{ $user->profile->belongto }}"> {{ $prf->name }} </option>
                        @foreach ($ar as $ar)
                            <option value=" {{ $ar->id }}"> {{ $ar->id }} :{{ $ar->name }}</option>
                        @endforeach

                    </select>

                    <!------------>
                    <hr>
                    <div class="row">
                        <div class="col-auto">
                            <label for="total_staff" class="form-label "> الملاك الكلي </label>
                            <input type="text"
                                class="form-control {{ $errors->has('total_staff') ? ' is-invalid' : '' }}"
                                id="total_staff" name="total_staff" value="{{ $user->profile->total_staff }}">
                            @if ($errors->has('total_staff'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('total_staff') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="current_staff" class="form-label "> الملاك الحالي </label>
                            <input type="text"
                                class="form-control {{ $errors->has('total_staff') ? ' is-invalid' : '' }}"
                                id="current_staff" name="current_staff" value="{{ $user->profile->current_staff }}">
                            @if ($errors->has('current_staff'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('current_staff') }}</strong>
                                </span>
                            @endif
                        </div>


                    </div>
                    <hr>
                    <!--------------------->


                </div>


                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>



            <!-- فورم ارقام الاتصال -->

            <form class="row g-3" action="contact" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')



                <label for="name" class="form-label "> ارقام الاتصال </label>
                <!---->
                {{-- <div class="col-md-12">
                    <label for="name" class="form-label "> phonenum</label>
                    <input type="text" class="form-control" {{ $errors->has('phonenum') ? ' is-invalid' : '' }}"
                        id="phonenum" name="phonenum" value="{{ $user->contactinfo->phonenum }}">
                    @if ($errors->has('phonenum'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phonenum') }}</strong>
                        </span>
                    @endif
                </div>

                <!---->
                <!---->

                <div class="col-md-12">
                    <label for="name" class="form-label "> mobile </label>
                    <input type="text" class="form-control" {{ $errors->has('mobilenum') ? ' is-invalid' : '' }}"
                        id="mobilenum" name="mobilenum" value="{{ $user->contactinfo->mobilenum }}">
                    @if ($errors->has('mobilenum'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobilenum') }}</strong>
                        </span>
                    @endif
                </div>
                <!----> --}}


                <b></b>


<div class="row">
<div class="col">
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> ارقام الموبايل </label>
                        <input type="text" class="form-control" {{ $errors->has('mobilenum') ? ' is-invalid' : '' }}"
                            id="mobilenum" name="mobilenum" value="{{ $user->contactinfo->mobilenum }}">
                        @if ($errors->has('mobilenum'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mobilenum') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>



                </div>
                <div class="col">
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> ارقام الارضي </label>
                        <input type="text" class="form-control" {{ $errors->has('phonenum') ? ' is-invalid' : '' }}"
                            id="phonenum" name="phonenum" value="{{ $user->contactinfo->phonenum }}">
                        @if ($errors->has('phonenum'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phonenum') }}</strong>
                            </span>
                        @endif

                    </div>

                </div>


                </div>


                <!--------------------->

                <!--------------------->
<hr class="mt-5">
                <label for="name" class="form-label "> صفحات الشكيل على الانترنت </label>
                <div class="col">
                <!---------row of lable------------>
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> موقع ويب </label>
                        <input type="text" class="form-control" {{ $errors->has('websitepg') ? ' is-invalid' : '' }}"
                        id="websitepg" name="websitepg" value="{{ $user->contactinfo->websitepg }}">
                    @if ($errors->has('websitepg'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('websitepg') }}</strong>
                        </span>
                    @endif

                    </div>


                </div>
                <!-----------end of lable---------->
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> فيسبوك </label>
                        <input type="text" class="form-control" {{ $errors->has('facebookpg') ? ' is-invalid' : '' }}"
                        id="facebookpg" name="facebookpg" value="{{ $user->contactinfo->facebookpg }}">
                    @if ($errors->has('facebookpg'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('facebookpg') }}</strong>
                        </span>
                    @endif

                    </div>



                </div>
                <!---------row of lable------------>
                <!---------row of lable------------>
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> انستكرام </label>
                        <input type="text" class="form-control" {{ $errors->has('instagrampg') ? ' is-invalid' : '' }}"
                        id="instagrampg" name="instagrampg" value="{{ $user->contactinfo->instagrampg }}">
                    @if ($errors->has('instagrampg'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('instagrampg') }}</strong>
                        </span>
                    @endif

                    </div>

                </div>
                <!-----------end of lable---------->

                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> يوتيوب </label>
                        <input type="text" class="form-control" {{ $errors->has('youtubepg') ? ' is-invalid' : '' }}"
                        id="youtubepg" name="youtubepg" value="{{ $user->contactinfo->youtubepg }}">
                    @if ($errors->has('youtubepg'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('youtubepg') }}</strong>
                        </span>
                    @endif



                    </div>

                </div>
            </div>
                <!-----------end of lable---------->
<div class="col">
                <!---------row of lable------------>
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> تويتر </label>
                        <input type="text" class="form-control" {{ $errors->has('twitterpg') ? ' is-invalid' : '' }}"
                        id="twitterpg" name="twitterpg" value="{{ $user->contactinfo->twitterpg }}">
                    @if ($errors->has('twitterpg'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('twitterpg') }}</strong>
                        </span>
                    @endif

                    </div>


                </div>
                <!-----------end of lable---------->
                <!---------row of lable------------>
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> تلكرام </label>
                       <input type="text" class="form-control" {{ $errors->has('telegrampg') ? ' is-invalid' : '' }}"
                            id="telegrampg" name="telegrampg" value="{{ $user->contactinfo->telegrampg }}">
                        @if ($errors->has('telegrampg'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telegrampg') }}</strong>
                            </span>
                        @endif

                    </div>


                </div>
                <!-----------end of lable---------->

                <!---------row of lable------------>
                <div class="row">
                    <div class="col-11">
                        <label for="name" class="form-label "> تيك توك </label>
                        <input type="text" class="form-control" {{ $errors->has('tiktokpg') ? ' is-invalid' : '' }}"
                            id="tiktokpg" name="tiktokpg" value="{{ $user->contactinfo->tiktokpg }}">
                        @if ($errors->has('tiktokpg'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tiktokpg') }}</strong>
                            </span>
                        @endif

                    </div>


                </div>
                <!-----------end of lable---------->
</div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">2حفظ</button>
                </div>

            </form>
            <!-- فورم ارقام الاتصال  نهاية -->
        </div>




        @extends('layouts.textwordjs')

        </div>

    </body>

    </html>
