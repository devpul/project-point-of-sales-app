@extends('layout.app')

@section('content')
    <a href="{{ route('dashboard.index') }}">Kembali</a>
    <div class="flex flex-col justify-center items-center gap-y-5">
        <h1>Transaksi Penjualan</h1>

        {{-- <table>
            <tr>
                <th>Sale ID</th>
                <th>Invoice Code</th>
                <th>Outlet ID</th>
                <th>Total Am</th>
                <th>Invoice Code</th>
                <th>Invoice Code</th>
            </tr>
        </table> --}}
        <ul>
            @forelse ($sales as $sale)
                <li>sale id:{{ $sale->id ?? '-' }}</li>
                <li>invoice_code: {{ $sale->invoice_code ?? '-' }}</li>
                <li>user_id: {{ $sale->user_id ?? '-' }}</li>
                <li>customer_id:{{ $sale->customer_id ?? '-' }}</li>
                <li>outlet_id:{{ $sale->outlet_id  ?? '-' }}</li>
                <li>total_amount:{{ $sale->total_amount  ?? '-' }}</li>
                <li>outlet_id:{{ $sale->outlet_id  ?? '-' }}</li>
                <li>discount:{{ $sale->discount  ?? '-' }}</li>
                <li>cash_change:{{ $sale->cash_change  ?? '-' }}</li>
                <li>shift_id:{{ $sale->shift_id   ?? '-' }}</li>
                <li>receipt_method:{{ $sale->receipt_method   ?? '-' }}</li>
                <li>description:{{ $sale->description   ?? '-' }}</li>
                <li>created_at:{{ $sale->created_at   ?? '-' }}</li>
                <li> updated_at:{{$sale->updated_at   ?? '-' }}</li>
                @foreach ($sale->sale_item as $item)
                    <li> Sale ID:{{$item->sale_id  ?? '-' }}</li>
                    <li> product:{{$item->product->name  ?? '-' }}</li>
                    <li> price:{{$item->price  ?? '-' }}</li>
                    <li> qty:{{$item->qty  ?? '-' }}</li>
                    <li> total:{{$item->total  ?? '-' }}</li>
                @endforeach
                <br>
            @empty
                <p class="col-span-4 italic">Belum Ada Transaksi Penjualan</p>
            @endforelse
            
            <a href="{{ route('penjualan.create') }}" class="py-1 px-3 rounded font-semibold bg-green-500 text-white">Buat Transaksi Penjualan</a>
        </ul> 
        
    </div>
@endsection 