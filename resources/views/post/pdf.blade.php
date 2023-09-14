<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ public_path('css/main.css') }}" rel="stylesheet">

    <style>
        @font-face {
            font-family:'FontAwesome';
            src: url('../fonts/fontawesome-webfont.ttf');
            font-weight: normal;
            font-style: normal;
        }
        .fa3 {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card post_detail">
            <div class="card-body d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-1">
                        <img src="{{ public_path('storage/images/' . $post->user->image) }}" alt="User Image"
                            class="img-class">
                    </div>
                    <div class="col-md-8 post-detail mx-2">
                        <div class="user-name">
                            <a href="" class="text-decoration-none text-dark">
                                <span class="card-title  fs-7"><b>{{ $post->user->name }}</b></span>
                            </a>
                        </div>
                        <div>
                            <span class="posted-type fa3 fa-solid {{ $post->type_icon }}"></span>
                            <span class="posted-time">{{ $post->posted_time }}</span>
                        </div>
                    </div>
                    <div class="m-3">
                        <h4 class="card-title fw-bold">{{$post->title}}</h4>
                        <p class="card-text">{{$post->message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>