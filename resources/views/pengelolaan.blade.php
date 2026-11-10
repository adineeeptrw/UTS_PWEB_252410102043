@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')
<h1>Penjualan Biji Kopi</h1>
<p class="sub">Dikelola oleh {{ $username }}. Data contoh untuk tugas UTS.</p>

<div class="ringkas">
    <div><span>Jenis biji</span><strong>{{ count($biji) }}</strong></div>
    <div><span>Total stok</span><strong>{{ $totalStok }} kg</strong></div>
    <div><span>Nilai stok</span><strong>Rp {{ number_format($nilaiStok, 0, ',', '.') }}</strong></div>
</div>

<div class="produk">
    @forelse ($biji as $item)
        <article class="card produk-item">
            <img class="produk-foto" src="{{ asset('images/' . $item['foto']) }}" alt="Biji kopi {{ $item['nama'] }}" width="480" height="360">
            <div class="produk-isi">
                <h2>{{ $item['nama'] }}</h2>
                <p class="asal">{{ $item['asal'] }}</p>
                <p>{{ $item['rasa'] }}</p>
                <div class="produk-bawah">
                    <strong>Rp {{ number_format($item['harga'], 0, ',', '.') }}<small> /kg</small></strong>
                    @if ($item['stok'] <= 10)
                        <span class="badge warn">{{ $item['stok'] }} kg (menipis)</span>
                    @else
                        <span class="badge ok">{{ $item['stok'] }} kg</span>
                    @endif
                </div>
            </div>
        </article>
    @empty
        <p>Belum ada data biji kopi.</p>
    @endforelse
</div>
@endsection
