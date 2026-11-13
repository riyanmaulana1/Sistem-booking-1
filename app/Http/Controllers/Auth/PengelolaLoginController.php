<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller ;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PengelolaLoginController extends Controller
{
    // membuat
    private const TUJUAN = [
        'admin'=> 'admin.beranda',
        'instansi'=> 'penyetuju.beranda',
    ];
    public function create(): View
    {
        return view('auth.pengelola-login');
    }

    public function store(Request $request):RedirectResponse
    {
        $data = $request ->validate([
            'sebagai'=> ['required', 'in:instansi,admin'],
            'email'=> ['required','email'],
            'password'=>['required'],
        ],[
            'sebagai.required'=>'pilih jenis akun.',
            'sebagai.in'=>'jenis akun tidak valid.',
            'email.required'=>'Email wajib diisi.',
            'email.email'=> 'format email tidak valid.',
            'password.required'=> 'password wajib diisi.',
        ]);
        $guard = $data['sebagai'];
        $kredensial = [
            'email'=> $data['email'],
            'password'=> $data['password'],
        ];
        if ($guard === 'instansi'){
            $kredensial['status_akun'] = 'aktif';
        }
        if (! auth::guard($guard)-> attempt($kredensial)){
            throw ValidationException::withMessages([
                'email'=>'Email atau Password salah, atau akun tidak aktif.',
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended(route(self::TUJUAN[$guard]));
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        Auth::guard('instansi')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('pengelola.masuk');
    }
}
