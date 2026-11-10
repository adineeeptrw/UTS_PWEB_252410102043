@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="profil">
    <div class="profil-sampul"></div>
    <div class="profil-isi">
        <div class="avatar">{{ strtoupper(substr($username, 0, 1)) }}</div>
        <h1>{{ $username }}</h1>
        <p class="sub">{{ $detail['Peran'] }} di {{ $detail['Cabang'] }}</p>
    </div>
</div>

<div class="profil-grid">
    <div class="card">
        <h2>Detail akun</h2>
        <dl>
            <dt>Username</dt>
            <dd>{{ $username }}</dd>
            @foreach ($detail as $label => $isi)
                <dt>{{ $label }}</dt>
                <dd>{{ $isi }}</dd>
            @endforeach
        </dl>
    </div>

    <div class="card">
        <h2>Perlu dicek hari ini</h2>
        <ul class="rasa">
            @forelse ($perluDicek as $item)
                <li>
                    <img class="thumb" src="{{ asset('images/' . $item['foto']) }}" alt="Biji kopi {{ $item['nama'] }}" width="56" height="56">
                    <div>
                        <strong>{{ $item['nama'] }}</strong>
                        <p>Sisa {{ $item['stok'] }} kg, segera tambah stok.</p>
                    </div>
                </li>
            @empty
                <li>Semua stok aman.</li>
            @endforelse
        </ul>
        <a class="tombol" href="{{ route('pengelolaan', ['username' => $username]) }}">Buka halaman Penjualan</a>
    </div>
</div>
@endsection
