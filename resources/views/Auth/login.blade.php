@extends('Layout.auth')

@section('content')
    @if(session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @elseif(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <form action="{{ route('login.store') }}" method="POST" 
     class="flex flex-col gap-y-2">
        @csrf

        <div class="input-group flex justify-between">
            <label>Email</label>
            <input type="email" name="email" class="border" required>
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group flex justify-between">
            <label>Password</label>
            <input type="password" name="password" class="border" required>
            @error('password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 font-semibold text-white">Log In</button>
    </form>
@endsection