@extends('layout.app')

@section('content')
    <a href="{{ route('dashboard.index') }}">Kembali</a>
    <div class="flex flex-col justify-center items-center gap-y-5">
        <h1>Transaksi Penjualan</h1>

        @forelse ($sales as $sale)
            {{ $sale }}
        @empty
            <p class="col-span-4 italic">Belum Ada Transaksi Penjualan</p>
        @endforelse
        
        <a href="{{ route('penjualan.create') }}" class="py-1 px-3 rounded font-semibold bg-green-500 text-white">Buat Transaksi Penjualan</a>
    </div>
@endsection 