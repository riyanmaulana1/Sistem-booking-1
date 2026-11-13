@extends('layouts.app')
@section('judul', 'Beranda Penyetuju')

@section('isi')
<header class="flex items-center justify-between bg-brand px-8 py-4 text-white">
<span class="font-semibold">BOKING RUANGAN · PENYETUJU</span>
<form method="POST" action="{{ route('pengelola.keluar') }}">
    @csrf
    <button type="submit" class="text-sm underline">Keluar</button>
</form>
</header>

<main class="p-8">
<p>Hallo {{ auth('instansi')->user()->nama_instansi }}.daftar pengajar</p>
</main>
@endsection
