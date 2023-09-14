@extends('layouts.app')
@section('content')
<div class="container user-detail">
  <div class="card mx-auto w-50">
    @if($user->image)
    <div class="card-header d-flex justify-content-between">
      <img src="{{ asset('storage/images/' . $user->image) }}" alt="User Image" class="img-class">
    </div>
    @else
    <div class="card-header d-flex justify-content-between">
      <div class="user-no-image bg-info d-flex justify-content-center img-class">
        <div class="align-self-center user-first-name">
          <h4>{{$user->name[0]}}</h4>
        </div>
        <div class="img-upload align-self-center">
          <!-- <label for="image-upload" class="upload-label">
            <span class="fas fa-camera"></span>
          </label> -->
          <input type="file" id="image-upload" class="form-control" name="image" accept="image/*" hidden
            onchange="onProfileChange(event)">

        </div>
      </div>
    </div>
    @endif

    <div class="card-body d-flex justify-content-between">
      <div class="content p-5">
        <h4 class="card-title">{{$user->full_name}}</h4>
        <p class="card-text">{{$user->email}}</p>
        <p class="card-text">{{ \Carbon\Carbon::parse($user->dob)->age }} <span>years</span></p>
        <!-- <p class="card-text">{{$user->nrc_no}}</p> -->
      </div>
      @if ($user->itself)
      <a href="{{ route('sa_user_edit', ['id' => $user->id]) }}"><button
          class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit Profile">
          <span class="fa-solid fa-pen-to-square p-1"></span></button></a>
      <!-- <a href="{{ route('sa_user_delete', ['id' => $user->id]) }}"><button class="btn btn-danger">
          <span class="fa-solid fa-trash-can-arrow-up p-1"></span></button></a> -->

      @endif


    </div>
  </div>
</div>
@endsection