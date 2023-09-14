<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>400 Page</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex items-center justify-center w-screen h-screen  bg-gradient-to-r from-indigo-600 to-blue-400">
        <div class="px-40 py-20 bg-white rounded-md shadow-xl">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-blue-600 text-9xl">400</h1>

                <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                    <span class="text-red-500">Oops!</span> Bad Request
                </h6>

                <p class="mb-8 text-center text-gray-500 md:text-lg">
                    Your Request  for doesn’t exist.
                </p>
                <a href="{{route('sa_list_post')}}"><button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Go
                        Back</button></a>

            </div>
        </div>
    </div>
</body>

</html>