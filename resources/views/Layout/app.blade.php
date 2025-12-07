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

    <div class="flex justify-between m-5">
        <h1>DASHBOARD <span class="text-blue-500">{{ ucfirst(Auth::user()->role)  }}</span></h1>
        <form action="{{ route('logout.store') }}" method="POST"> 
            @csrf
            <button type="submit" class="text-white font-semibold bg-red-500">logout</button>
        </form>
    </div>
    
    @yield('content')

</body>
</html>