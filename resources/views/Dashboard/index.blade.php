@extends('Layout.app')

@section('content')
    <div class="flex flex-col gap-y-5 justify-center items-center">
        <h1 class="font-bold">POINT OF SALES</h1>

        <div class="cards flex gap-x-3 p-10 bg-blue-500 items-center">
            <svg class="fill-white size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>

            <h2 class="font-bold text-2xl  text-white">
                {{ $totalProduct }}
            </h2>
        </div>

        <ul class="flex flex-col gap-y-3">
            <li class="px-3 py-1 rounded shadow cursor-pointer font-semibold hover:bg-green-500 hover:text-white">
                <a href="{{ route('product.index') }}">Manajemen Produk</a>
            </li>
            <li class="px-3 py-1 rounded shadow cursor-pointer font-semibold hover:bg-green-500 hover:text-white">
                Product
            </li>
            <li class="px-3 py-1 rounded shadow cursor-pointer font-semibold hover:bg-green-500 hover:text-white">
                Product
            </li>
            <li class="px-3 py-1 rounded shadow cursor-pointer font-semibold hover:bg-green-500 hover:text-white">
                Product
            </li>
        </ul>
    </div>
@endsection