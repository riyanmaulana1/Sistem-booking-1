@extends('layouts.app')

@section('judul','Beranda Admin')

@section('isi')
<header class="flex item-center justify-between bg-brand px-8 py-4 text-white">
    <span class="font-semibold">BOOKING RUANGAN KAMPUS · ADMIN</span>
    <form method="POST" action="{{ route('pengelola.keluar') }}">
        @csrf
        <button type="submit" class="text-sm undeline">Keluar</button>
    </form>
</header>

<main class="p-8">
    <p>Hallo, {{ auth('admin')->user()->nama }}. Halaman admin menyusul
    </p>
</main>
@endsection
