@extends('layouts.app')
@section('judul','Masuk Pengelola')
@section('isi')
<header class="bg-brand px-8 py-4 font-semibold text-white">
    Booking Ruangan Kampus · Pengelola
</header>

<main class="mx-auto max-w-md px-4 py-10">
    <div class="rounded-xl border border-slate-300 bg-white p-6">
        <h1 class="mb-1 text-lg font-semibold">Masuk sebagai Pengelola</h1>
        <p class="mb-4 text-sm text-slate-600">Akun instansi  dibuat Oleh admin. Tidak ada pendaftaran mandiri</p>
        <form method="POST" action="{{ route('pengelola.masuk')}}" class="space-y-4">
            @csrf
            <div>
                <label for="sebagai" class="mb-1 block text-sm font-semibold">Masuk sebagai</label>
            <select name="sebagai" id="sebagai" class="min-h-11 w-full rounded-lg border border-slate-400 bg-white px-3 py-2">
                <option value="instansi" @selected(old('sebagai')=== 'instansi')>Instansi</option>
                <option value="admin" @selected(old('sebagai')=== 'admin')>Admin</option>
            </select>
            @error('sebagai')
            <p class="mt-1 text-sm text-red-800">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-1 block text-sm font-semibold">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required
            class="min-h-11 w-full rounded-lg border border-slate-400 px-3 py-2">
            @error('email')
                <p class="mt-1 text-sm text-red-800">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-1 block text-sm font-semibold">Password</label>
            <input type="password" id="password" name="password" autocomplete="current-password" required
            class="min-h-11 w-full rounded-lg border border-slate-400 px-3 py-2">
            @error('password')
            <p class="mt-1 text-sm text-red-800"> {{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="min-h-11 rounded-lg bg-brand px-5 py-2 font-semibold hover:opacity-90">
            Masuk
        </button>
    </form>
</div>
</main>
@endsection
