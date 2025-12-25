<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @elseif (session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif

    <div class="bg-gray-100">
        @yield('content')
    </div>
</body>
</html>