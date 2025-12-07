@extends('layout.app')

@section('content')
    <a href="{{ route('penjualan.index') }}">Kembali</a>
    <div class="flex flex-col justify-center items-center gap-y-5">
        <h1>Transaksi Penjualan</h1>

        <form action="{{ route('penjualan.store') }}" method="POST" 
        class="flex flex-col gap-y-5 p-2 items-center bg-blue-500">
            @csrf

            <div class="input-group flex justify-between w-full">
                <label for="">Product ID</label>
                <select name="product_id">
                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name . ' - ' . $product->price }}</option>
                    @empty
                        <p>Belum ada produk.</p>
                    @endforelse
                </select>
            </div>
            
            {{-- invoice code otomatis --}}
            
            <div class="input-group flex justify-between w-full">
                <label>Customer ID</label>
                <select name="customer_id" >
                    @forelse ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name . '-' . $customer->status }}</option>
                    @empty
                        <option disabled>Belum ada customer.</option>
                    @endforelse
                </select>
            </div>

            <div class="input-group flex justify-between w-full">
                <label>Outlet ID</label>
                <select name="outlet_id">
                    @forelse ($outlets as $outlet)
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                    @empty
                        <option disabled>Belum ada outlet.</option>
                    @endforelse
                </select>
            </div>

            <div class="input-group flex justify-between w-full">
                <label>Method</label>
                <select name="method"  required>
                    <option value="cash">Cash</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>
            <div class="input-group flex justify-between w-full">
                <label>Paid Amount</label>
                <input type="number" name="paid_amount" min="0" required>
            </div>
            
            <!-- Cash Change Otomatis -->

            <div class="input-group flex justify-between w-full">
                <label>Status</label>
                <select name="status">
                    <option value="pending">pending</option>
                    <option value="paid">paid</option>
                    <option value="cancel">cancel</option>
                    <option value="refund">refund</option>
                </select> 
            </div>

            <div class="input-group flex justify-between w-full">
                <label>Quantity</label>
                <input type="number" name="qty" min="1" max="10" required
                class="border text-center">
            </div>

            {{-- <div class="input-group flex justify-between w-full">
                <label>Price</label>
                <input type="number" name="price" min="0" required
                class="border text-center">
            </div>

            <div class="input-group flex justify-between w-full">
                <label>Total</label>
                <input type="number" name="qty" min="1" max="10" required
                class="border text-center">
            </div>
             --}}

            <div class="input-group flex justify-between w-full">
                <label>Receipt Method</label>
                <select name="receipt_method" required>
                    <option value="print">Print</option>
                    <option value="email">Email</option>
                </select>
            </div>

            <div class="input-group flex justify-between w-full">
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>

            <button type="submit" class="bg-green-500 text-white font-semibold py-1 px-3 rounded">buy</button>
        </form>
    </div>
@endsection 