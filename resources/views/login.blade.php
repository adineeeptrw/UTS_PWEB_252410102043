@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login">
    <img class="login-foto" src="{{ asset('images/login.jpg') }}" alt="Biji kopi sangrai" width="480" height="600">

    <div class="login-form">
        <img class="login-logo" src="{{ asset('images/logo.png') }}" alt="Mauw Coffee" width="240" height="208">
        <p>Masuk untuk mengelola penjualan biji kopi</p>

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Username kamu">

            @error('username')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">Masuk</button>
        </form>
    </div>
</div>
@endsection
