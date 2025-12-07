@extends('layout.app')

@section('content')
    <div class="flex flex-col justify-center items-center gap-y-5">
        <h1>Transaksi Penjualan</h1>

        <form action="{{ route('penjualan.store') }}" method="POST" class="flex flex-col gap-y-5 items-center">
            @csrf

            <select name="">
                @forelse ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @empty
                    <p>Belum ada produk</p>
                @endforelse
            </select>

            <input type="number" name="quantity" min="1" max="10" required
            class="border text-center">

            <button type="submit" class="bg-green-500 text-white font-semibold py-1 px-3 rounded">buy</button>
        </form>
    </div>
@endsection 