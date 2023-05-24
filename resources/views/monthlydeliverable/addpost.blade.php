<!DOCTYPE html>

<link rel="stylesheet" href="/css/loading.css">
<script src="https://cdn.tiny.cloud/1/mw372xxhthn3rylefl7v3oafbkdoucgek2vj49y85j7bs4he/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
@extends('layouts.app')

@section('content')

    <div class="container">

        <form class="row g-3" action="../md/addpost" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="Title" class="form-label pt-5"> العنوان </label>
                <input type="text" class="form-control {{ $errors->has('Title') ? ' is-invalid' : '' }}" id="Title"
                    name="Title">
                @if ($errors->has('Title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Title') }}</strong>
                    </span>
                @endif
            </div>
            <label for="image" class="col-md-4 col-form-label"> ملف النشاط </label>

            <div class="input-group mb-3">

                <input type="file" class="form-control" id="image" name="pdffile">

                @if ($errors->has('image'))
                    <strong>{{ $errors->first('image') }}</strong>
                @endif
            </div>









            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="Content" name="Content"></textarea>
                @if ($errors->has('Content'))
                    <strong>{{ $errors->first('Content') }}</strong>
                @endif
                <label for="floatingTextarea2">Comments</label>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>

    </div>


    @extends('layouts.textwordjs')

    </html>
