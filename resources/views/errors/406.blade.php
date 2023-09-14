<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Service Unavailable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f8f9fa;
    }

    .display-1 {
        font-size: 150px;
    }

    .display-4 {
        color: #dc3545;
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 70vh;">
            <div class="col-md-6 text-center">
                <h1 class="display-1">406</h1>
                <h2 class="display-4">Not Acceptable</h2>
                <p class="lead">Sorry, the requested resource cannot be served in the format requested.</p>
            </div>
            <a href="{{route('sa_list_post')}}" class="text-center"><button
                class="btn btn-primary text-white font-bold py-2 px-4 rounded">Go
                Back</button></a>
        </div>
    </div>

</body>

</html>