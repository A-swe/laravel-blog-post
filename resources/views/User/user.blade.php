@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <h1 class="">User List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">NRC</th>
                    <th scope="col">Age</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($users as $user)
            <tbody>
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->nrc_no}}</td>
                    <td>{{ \Carbon\Carbon::parse($user->dob)->age }}</td>
                    <td colspan="3">
                        <a href="{{ route('sa_user_edit', ['id' => $user->id]) }}"><button
                            class="btn btn-success"><span class="fa-solid fa-pen-to-square p-1"></span>Edit</button></a>
                            <a href="{{ route('sa_user_delete', ['id' => $user->id]) }}"><button
                                class="btn btn-danger"><span class="fa-solid fa-trash-can-arrow-up p-1"></span>Delete</button></a>
                    </td>
                </tr>
            </tbody>
            @endforeach

        </table>
        <a href="{{route('sa_create_user')}}"><button class="btn btn-primary mr-auto">+Add User</button></a>
    </div>
@endsection