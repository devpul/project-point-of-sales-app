@extends('Layout.app')

@section('content')
    <div class="min-h-screen flex flex-col justify-center text-center gap-y-5">
        <h1>Stock-In Page</h1>

        <div>
            <a href="{{ route('stockIn.create') }}"
            class="text-white font-semibold rounded bg-green-500 px-3 py-1">
                Tambah Stok Masuk
            </a>
        </div>
        
    </div>
    
@endsection