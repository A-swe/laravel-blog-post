@extends('layouts.app')
@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <form action="{{ route('sa_user_update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-center">
            @if($user->image)
            <div class="d-flex justify-content-center">
                <div class="user-no-image bg-info d-flex justify-content-center">
                    <img src="{{ asset('storage/images/' . $user->image) }}" alt="User Image" class="user-image"
                        id="user_profile">
                    <div class="img-upload align-self-center">
                        <label for="image-upload" class="upload-label">
                            <span class="fas fa-camera"></span>
                        </label>
                        <input type="file" id="image-upload" class="form-control" name="image" accept="image/*"
                            hidden="" onchange="onProfileChange(event)">

                    </div>
                </div>
            </div>
            @else
            <div class="user-no-image bg-info d-flex justify-content-center">
                <div class="align-self-center user-first-name">
                    <h4>{{$user->name[0]}}</h4>
                </div>
                <div class="img-upload align-self-center">
                    <label for="image-upload" class="upload-label">
                        <span class="fas fa-camera"></span>
                    </label>
                    <input type="file" id="image-upload" class="form-control" name="image" accept="image/*" hidden
                        onchange="onProfileChange(event)">

                </div>
            </div>
            @endif
        </div>
        <div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="" value="{{$user->email}}">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="floatingInput" placeholder="" value="{{$user->name}}">
                <label for="name" class="form-label">Name</label>
                @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender - </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="1" @if($user->gender == 1) checked
                    @endif>
                    <label class="form-check-label" for="maleRadio">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="2" @if($user->gender == 2) checked
                    @endif>
                    <label class="form-check-label" for="femaleRadio">Female</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="dob" id="floatingInput" placeholder="" value="{{$user->dob}}">
                <label for="dob" class="form-label">Date of Birth</label>
                @if($errors->has('dob'))
                <div class="error text-danger">{{ $errors->first('dob') }}</div>
                @endif
            </div>
            <div class="input select mb-3">
                <label class="require_label" for="nrc_region">NRC.No</label>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input select"><select name="nrc_region" class="form-control" id="nrc-region">
                                <option value="">Choose</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select></div>
                    </div>

                    <div class="col-md-4">
                        <div class="input text">
                            <input type="text" name="nrc_township" class="form-control" placeholder="Type Township">
                        </div>
                    </div>

                    <div class="col-md-2">

                        <div class="input select"><select name="citizen" class="form-control" id="citizen">
                                <option value="(N)">(N)</option>
                                <option value="(PYU)">(PYU)</option>
                                <option value="(AE)">(AE)</option>

                            </select></div>
                    </div>

                    <div class="col-md-3">
                        <div class="input text"><input type="text" name="nrcno" class="form-control required_input"
                                maxlength="6" placeholder="eg. 223389" id="nrcno"></div>
                    </div>
                </div>

            </div>
            <!-- <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div> -->

            <input type="submit" value="Update Profile" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
<script language="JavaScript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
    const onProfileChange = (event) => {
        var reader = new FileReader();
        reader.onload = event => $("#user_profile").attr('src', event.target.result);
        reader.readAsDataURL(event.target.files[0]);
    };
</script>