@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="hero">
    <h1>Halo, {{ $username }}</h1>
    <p>Ringkasan stok biji kopi dari halaman Penjualan.</p>
</section>

<div class="grid">
    @foreach ($ringkasan as $item)
        @include('partials.stat-card', ['item' => $item])
    @endforeach
</div>

<h2 class="judul-bagian">Kenali Arabika dan Robusta</h2>
<div class="jenis">
    @foreach ($jenisKopi as $jenis)
        <div class="card">
            <h3>{{ $jenis['nama'] }}</h3>
            <p>{{ $jenis['rasa'] }}</p>
            <dl>
                <dt>Kafein</dt>
                <dd>{{ $jenis['kafein'] }}</dd>
                <dt>Tumbuh di</dt>
                <dd>{{ $jenis['ketinggian'] }}</dd>
            </dl>
        </div>
    @endforeach
</div>

<h2 class="judul-bagian">Catatan rasa biji kami</h2>
<div class="card">
    <ul class="rasa">
        @foreach ($biji as $item)
            <li>
                <img class="thumb" src="{{ asset('images/' . $item['foto']) }}" alt="Biji kopi {{ $item['nama'] }}" width="56" height="56">
                <div>
                    <strong>{{ $item['nama'] }}</strong> <span class="asal">({{ $item['asal'] }})</span>
                    <p>{{ $item['rasa'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
