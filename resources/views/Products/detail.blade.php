@extends('Layout.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <a href="{{ route('product.index') }}">Kembali</a>
        <h1>DETAIL</h1>
    </div>
    

    <div class="min-h-screen text-center p-5 flex flex-col  items-center gap-x-10 w-full lg:w-[1200px] mx-auto shadow">
        
        <div class="shadow p-5 space-y-5">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                class="object-cover h-[350px] w-[350px]">
            @endif

            <div class="flex justify-center gap-x-2 items-center">
                @forelse ($product->product_image as $additionalImage)
                    <img src="{{ asset('storage/' . $additionalImage->filename) }}"
                    class="h-[100px] w-[100px] flex justify-center items-center object-cover p-1 shadow ">
                @empty
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="h-[100px] w-[100px] object-cover p-1 shadow flex justify-center items-center">
                            <p>➕</p>
                        </div>
                    @endfor
                @endforelse
            </div>
            

            <h2 class="text-4xl font-bold">{{ $product->name }}</h2>

            
            <form action="" method="POST" class="">
                @csrf

                <button type="submit" class="font-semibold px-3 py-1 rounded text-white text-2xl bg-green-500">Beli Produk</button>
            </form>

            <p class="font-semibold text-lg text-gray-700 italic">stok: 20</p>

            <div class="flex justify-center gap-x-2">
                <a href="{{ route('product.edit', $product->id) }}" class="bg-yellow-500 text-center p-1 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg></a>
                
                <form action="{{ route('product.destroy' , $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ?')" class="bg-red-500 text-center p-1 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg></button>
                </form>
            </div>
        </div>
    </div>
@endsection
