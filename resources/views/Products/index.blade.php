@extends('Layout.app')

@section('content')
    <div class="flex flex-col gap-y-5 justify-center items-center">
        <a href="{{ route('dashboard.index') }}">Back</a>
        <h1>Product Lists</h1>

        <a href="{{ route('product.create') }}"
        class="bg-green-500 text-white font-semibold px-3 py-1 rounded-2xl">Add Products</a>

        <div class="grid grid-cols-4 gap-10 mt-10">
            @forelse ($products as $product)
                <div class="flex flex-col text-center p-5 shadow transform duration-300 hover:scale-105 cursor-pointer">
                    @if ($product->image)
                        <img src="{{ asset('storage/products/' . $product->image)  }}"
                        class="object-center object-cover w-[200px] h-[200px] mx-auto">
                    @endif
                    
                    <p class=" text-black font-semibold">{{ $product->name }}</p> 
                </div>  
            @empty
                <div class="col-span-4">
                     <p class="text-gray-500 italic">Belum ada produk dibuat.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection