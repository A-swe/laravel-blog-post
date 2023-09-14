@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Edit User Profile</h2>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob">
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
                                <option value="(N)">(N)</option>
                                <option value="(N)">(N)</option>
                                <option value="(N)">(N)</option>
                                
                            </select></div>
                    </div>

                    <div class="col-md-3">
                        <div class="input text"><input type="text" name="nrcno" class="form-control required_input"
                                maxlength="6" placeholder="eg. 223389" id="nrcno"></div>
                    </div>
                </div>

            </div>

            <input type="submit" value="Update Profile" class="btn btn-primary">
        </form>
    </div>
@endsection
