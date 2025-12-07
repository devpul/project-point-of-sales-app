@extends('Layout.app')

@section('content')
    <div class="min-h-screen">
        <a href="{{ route('stockIn.index') }}" class="flex justify-center">Kembali</a>

        <form action="{{ route('stockIn.store') }}" method="POST" class="flex justify-center ">
            @csrf

            <div class="flex flex-col items-center gap-y-5 shadow p-5 ">
                @if($suppliers->isEmpty())
                    <p class="text-center">Supplier tidak ditemukan.</p>
                @else
                    <select name="supplier_id">
                        @foreach ($suppliers as  $supplier)
                            <option value="{{ $supplier->id }}">Supplier {{ $supplier->name }}</option>            
                        @endforeach
                    </select>
                @endif

                @if($stocks->isEmpty())
                    <p class="text-center">Bahan Baku tidak ditemukan.</p>
                @else
                    <select name="stock_id">
                        @foreach ($stocks as $stock)
                            <option value="{{ $stock->id }}">{{ $stock->name . ' - ' . $stock->unit . ' - ' . $stock->warehouse->city }}</option>            
                        @endforeach
                    </select>
                @endif

                <div class="">
                    <label>Quantity</label>
                    <input type="number" name="quantity" min="1" required
                    class="border">
                </div>

                <div class="">
                    <label>Notes</label>
                    <textarea name="notes" class="border"></textarea>
                </div>
                
                <button type="submit" class="text-white font-semibold py-1 px-3 rounded bg-green-500">Simpan</button>
            </div>
        </form>
    </div>
    
    
    

@endsection