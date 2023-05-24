<!DOCTYPE html>
<link rel="stylesheet" href="/css/loading.css">

<script src="https://cdn.tiny.cloud/1/mw372xxhthn3rylefl7v3oafbkdoucgek2vj49y85j7bs4he/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
@extends('layouts.app')

@section('content')

    <body>
        <div class="container pt-5">
            <h4> تعديل الصفحة <h4>
                    <hr>


                    <form class="row g-3" action="u" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="col-md-12">
                            <label for="Title" class="form-label ">العنوان</label>
                            <input type="text" class="form-control {{ $errors->has('Title') ? ' is-invalid' : '' }}"
                                id="Title" name="Title" value="{{ $pg->Title }}">
                            @if ($errors->has('Title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="Content" name="Content">{{ $pg->Content }}</textarea>
                            @if ($errors->has('Content'))
                                <strong>{{ $errors->first('Content') }}</strong>
                            @endif
                            <label for="floatingTextarea2">Comments</label>
                            </textarea>



                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>


        </div>

    </body>

    </html>
    @extends('layouts.textwordjs')
