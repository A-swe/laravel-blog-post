<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="utf-8">
        <title>Social App</title>
    </head>
    <body>
        <span>Welcome Page</span>
        <a href="{{ route('sa_get_users') }}">Go User Page, {{ $name }}</a>
    </body>
</html>
