@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="m-4 w-50 text-end">
            <!-- {{ route('sa_download_post', ['id' => $post->id]) }} -->
            <a class="btn btn-primary print-pdf" href="{{ route('sa_download_post', ['id' => $post->id]) }}">Export to
                PDF</a>
        </div>
        <div class="container w-50"  id="post_detail">
            <div class="card post_detail">
                <div class="card-body d-flex justify-content-between">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="{{ asset('storage/images/' . $post->user->image) }}" alt="User Image"
                                class="img-class">
                        </div>
                        <div class="col-md-8 post-detail mx-2">
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
                        <div class="m-3">
                            <h4 class="card-title fw-bold">{{$post->title}}</h4>
                            <p class="card-text">{{$post->message}}</p>
                        </div>
                    </div>
                    <div class="dropend">
                        <button class="border-0" data-bs-toggle="dropdown" aria-expanded="false"><span
                                class="fas fa-ellipsis-vertical"></span></button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('sa_edit_post', ['id' => $post->id]) }}">Edit
                                </a></li>
                            <li><a class="dropdown-item delete-btn"
                                    href="{{ route('sa_delete_post', ['id' => $post->id]) }}">Delete
                                </a></li>
                        </ul>
                    </div>
                    <!-- @if ($post->can_edit)
                <a href="{{ route('sa_edit_post', ['id' => $post->id]) }}">
                    <button class="btn btn-success">
                        <span class="fa-solid fa-pen-to-square p-1"></span>
                    </button>
                </a>
                @endif

                @if ($post->can_delete)
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal">
                    <span class="fa-solid fa-trash-can-arrow-up p-1"></span>
                </button>
                @endif -->
                </div>
            </div>
        </div>
        <div class="comment m-2 p-3 w-50">
            @foreach($post->comments as $comment)
            <div class="mb-3 d-flex justify-content-between">
                <div>
                    <img src="{{ asset('storage/images/' . $comment->user->image) }}" alt="User Image"
                        class="img-class">
                    <span class="text-secondary">{{ $comment->user->name }}</span>
                    <span class="text-secondary">{{ $post->posted_time }}</span>
                    <div class="comment-content">
                        <p class="mx-5 px-2 fs-6 original-content">
                            {{ $comment->content }}
                        </p>
                    </div>

                </div>
                <div class="dropend">
                    <button class="border-0" data-bs-toggle="dropdown" aria-expanded="false"><span
                            class="fas fa-ellipsis-vertical"></span></button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <!-- <li><a class="dropdown-item edit-comment"
                                href="{{route('sa_edit_comment',['id' => $comment->id])}}">Edit
                                Comment</a></li> -->
                        <li><a class="dropdown-item" href="{{route('sa_delete_comment',['id' => $comment->id])}}">Delete
                                Comment</a></li>
                    </ul>
                </div>
            </div>

            @endforeach
            @auth
            <form action="{{ route('sa_add_comment', ['postId' => $post->id]) }}" method="post">
                @csrf
                <div class="input-group flex-nowrap">
                    <input type="text" name="content" class="form-control p-3" placeholder="Add Comment....">
                    <button type="submit" class="btn btn-primary" id="addon-wrapping" value="Comment"><span
                            class="fas fa-arrow-right"></span></button>
                </div>
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection
<script language="JavaScript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
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
        // $('.print-pdf').click(function () {
        //     var print_content = document.getElementById('post_detail').innerHTML;
        //     var post_content = document.body.innerHTML; 
        //     document.body.innerHTML = print_content
        //     setTimeout(function () {
        //             window.print();
        //             location.reload();
        //         }, 1000);
        // });

    });

</script>