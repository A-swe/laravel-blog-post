@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            @guest
            @else
            <div class="add-post">
                <a href="{{ route('sa_store_post') }}" class="mb-3 add-post" id="addPost">
                    <button class="btn btn-primary mr-auto m-3">Add Post</button>
                </a>
            </div>
            @endguest
            @if ($posts->all())
            @foreach ($posts as $post)
            <div class="row border post-list m-3 p-2">
                @if($post->user->image)
                <div class="col-md-1 p-2">
                    <img src="{{ asset('storage/images/' . $post->user->image) }}" alt="User Image" class="img-class">
                </div>
                @else
                <div class="col-md-1 p-2">
                    <div class="img-class bg-info d-flex justify-content-center">
                        <div class="align-self-center user-post-name">
                            <h4>{{$post->user->name[0]}}</h4>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-md-8 post-detail p-2">
                    <div class="user-name">
                        <a href="{{ route('sa_user_detail', ['id' => $post->user->id]) }}"
                            class="text-decoration-none text-dark">
                            <span class="card-title fs-7"><b>{{ $post->user->name }}</b></span>
                        </a>
                    </div>
                    <div>
                        <span class="posted-type fa-solid {{ $post->type_icon }}"></span>
                        <span class="posted-time">{{ $post->posted_time }}</span>
                    </div>
                </div>
                <div class="post-content">
                    <a href="{{ route('sa_detail_post', ['id' => $post->id]) }}" class="text-decoration-none text-dark">
                        <div class="p-2">
                            <h5 class="card-title p-2 fw-bold">{{ $post->title }}</h5>
                            <p class="card-text p-2">{{ $post->message }}</p>

                        </div>
                        <!-- <div>
                            @if ($post->can_edit)
                            <a href="{{ route('sa_edit_post', ['id' => $post->id]) }}" id="editPost">
                                <button class="btn btn-success">
                                    <span class="fa-solid fa-pen-to-square p-1"></span>
                                </button>
                            </a>
                            @endif
    
                            @if ($post->can_delete)
                            <a href="{{ route('sa_delete_post', ['id' => $post->id]) }}" class="delete-btn">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal">
                                    <span class="fa-solid fa-trash-can-arrow-up p-1"></span>
                                </button>
                            </a>
    
                            @endif
                        </div> -->

                        <div class="m-2 p-2 text-muted">
                            <b>
                                @if($post->comments->count() > 0)
                                {{$post->comments->count()}} comments
                                @else
                                <span>No comments</span>
                                @endif
                            </b>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <h4 class="text-info">No Post Data</h4>
            @endif
            {{ $posts->links() }}
            <form id="comment_edit_form">
                <!-- div -->
                <!-- div -->
                <!-- div -->
                <!-- div -->
                <!-- div -->
                <!-- div -->
            </form>
        </div>
        <!-- <div class="col-md-6 mt-5">
            <div style="max-width: 600px; margin: 0 auto;">
                <canvas id="postCountChart"></canvas>
            </div>
        </div> -->
    </div>



</div>
@endsection
<script language="JavaScript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addPost').click(function (e) {
            e.preventDefault();
            var formContent = `
                <form action="{{ route('sa_store_post') }}" method="post">
                        @csrf
                        <div class="post-head m-0 d-flex justify-content-between">
                            <img src="https://www.w3schools.com/bootstrap5/img_avatar3.png" alt=""
                                class="img-class">
                            <select name="post_type" class="post-type">
                                <option value="1">Public Post</option>
                                <option value="2">Private Post</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="floatingInput" placeholder="" value="{{ old('title') }}">
                                <label for="floatingInput" class="form-label">Title</label>
                            @if($errors->has('title'))
                            <div class="error text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="message" class="form-control" id="floatingTextarea" placeholder="">{{ old('message') }}</textarea>
                            <label for="message" class="form-label">Message</label>
                            @if($errors->has('message'))
                            <div class="error text-danger">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                        </div>

                        <div class="float-end">
                            <input type="submit" value="Post" class="btn btn-primary">
                        </div>
                    </form>
                `;

            bootbox.dialog({
                title: "What's on your mind",
                message: formContent,
                centerVertical: true,
            });
        });
        $('.delete-btn').click(function (e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('href');
            bootbox.confirm({
                title: 'Delete Post?',
                message: 'Do you want to delete this post?.',
                centerVertical: true,
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    if (result) {
                        window.location.href = deleteUrl;
                    }
                }
            });
        });

    });

</script>