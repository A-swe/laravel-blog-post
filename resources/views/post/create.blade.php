@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Create Post</h2>
        <form action="{{ route('sa_store_post') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                @if($errors->has('title'))
                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <div class="error text-danger">{{ $errors->first('message') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="post_type" class="form-label">Post type</label>
                <select name="post_type" class="form-select">
                    <option value="1">Public Post</option>
                    <option value="2">Private Post</option>
                </select>
            </div>
            <input type="submit" value="Add Post" class="btn btn-primary">
        </form>
    </div>
@endsection