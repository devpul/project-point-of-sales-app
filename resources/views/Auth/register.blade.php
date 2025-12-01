@extends('Layout.auth')

@section('content')
     <form action="">
        <div class="input-group flex justify-between">
            <label for="">Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="input-group flex justify-between">
            <label for="">Email</label>
            <input type="text" name="name" required>
        </div>

        <div class="input-group flex justify-between">
            <label for="">Password</label>
            <input type="text" name="name" required>
        </div>
    </form>
@endsection