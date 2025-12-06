@extends('Layout.app')

@section('content')
    <div class="flex justify-between m-5">
        <h1>DASHBOARD <span class="text-blue-500">{{ ucfirst(Auth::user()->role)  }}</span></h1>
        <form action="{{ route('logout.store') }}" method="POST"> 
            @csrf
            <button type="submit" class="text-white font-semibold bg-red-500">logout</button>
        </form>
    </div>

    
    <div class="flex flex-col gap-y-5 justify-center items-center min-h-screen">
        
    </div>
@endsection