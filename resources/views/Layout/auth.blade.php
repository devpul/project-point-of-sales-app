<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>
<body>
    <div class="flex justify-center min-h-screen items-center">
        <div class="p-5 shadow-xl">
            @yield('content')
        </div>
    </div>
</body>
</html>