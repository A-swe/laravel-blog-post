@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <form action="{{ route('sa_update_post',['id' => $post->id]) }}" method="post">
        @csrf
        <div class="w-50">
            <div class="col-lg-12 offset-lg-6">
                <button class="btn btn-success mb-3">Update</button>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="title"
                        value="{{ old('title',$post->title) }}" placeholder="">
                    <label for="title" class="form-label fs-5">Title</label>
                    @if($errors->has('title'))
                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <textarea name="message" class="form-control"
                    id="floatingTextarea2" style="height: 100px" placeholder="">{{old('message',$post->message) }}</textarea>
                    <label for="message" class="form-label fs-5">Message</label>
                    @if($errors->has('message'))
                    <div class="error text-danger">{{ $errors->first('message') }}</div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <select name="post_type" class="form-select" id="floatingSelectGrid" placeholder="">
                        <option value="1">Public Post</option>
                        <option value="2">Private Post</option>
                    </select>
                    <label for="post_type" class="form-label">Post type</label>

                </div>
            </div>
        </div>

    </form>
</div>
@endsection