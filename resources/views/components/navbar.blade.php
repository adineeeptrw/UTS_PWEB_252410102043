@props(['username'])

<nav class="navbar">
    <a class="brand" href="{{ route('dashboard', ['username' => $username]) }}">
        <img src="{{ asset('images/logo.png') }}" alt="Mauw Coffee" width="74" height="64">
    </a>
    <div class="menu">
        <a href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a>
        <a href="{{ route('profile', ['username' => $username]) }}">Profil</a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}">Penjualan</a>
        <a class="keluar" href="{{ route('login') }}">Keluar</a>
    </div>
</nav>
