@extends('Layout.app')

@section('content')
    <div class="flex flex-col gap-y-5 justify-center items-center">
        <a href="{{ route('product.index') }}">Kembali</a>
        <h1>Product Lists</h1>

        <form id="form" action="{{ route('product.store') }}" method="POST" 
        enctype="multipart/form-data" class="shadow p-5 flex flex-col gap-y-5">
            @csrf

            <div id="inputBar" class="input-group flex flex-col gap-y-3">
                <label>Product Name</label>
                <div class="flex gap-x-5">
                    <input type="text" name="name[]" required
                    class="border focus:border-blue-500 outline-none px-3 py-1">
                    <p id="toggleAdd" class="font-semibold bg-yellow-500 px-3 py-1 cursor-pointer">Add</p>
                </div>
                @error('name.*')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <label>Product Image</label>
                <input type="file" name="image[]" required>
                @error('image.*')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-500 text-white font-semibold px-3 py-1">Save Product(s)</button>
            </div>
            
        </form>
    </div>

    <script>
        const toggleAdd = document.getElementById('toggleAdd');
        const inputBar = document.getElementById('inputBar');
        const form = document.getElementById('form');

        toggleAdd.addEventListener('click', function(e) {
            e.preventDefault();

            const panjangInput = document.querySelectorAll('input[name="name[]"]').length;
            if (panjangInput > 2) {
                alert('Maksimal 2 product saja.'); 
                return; 
            }

            const clone = inputBar.cloneNode(true);
            clone.querySelector('input').value = '';

            const cloneAdd = clone.querySelector('#toggleAdd');
            if (cloneAdd) cloneAdd.remove();

            // sisipkan setelah inputBar
            inputBar.insertAdjacentElement('afterend', clone)
        });

    </script>
@endsection