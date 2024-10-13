<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Login')]
class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string',
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
    ];

    public function render()
    {
        return view('pages.auth.login');
    }

    public function submit()
    {
        sleep(2); // Simulasi delay
    
        $this->validate();
    
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
    
            // Periksa apakah email telah terverifikasi
            if ($user->email_verified_at) {
                $route = route('dashboard');
                $message = 'Verifikasi berhasil, silahkan klik oke untuk login!';
                $this->dispatch('success', ['message' => $message, 'route' => $route]);
            } else {
                // Logout user yang email-nya belum terverifikasi
                Auth::logout();
                $this->addError('email', 'Email belum terverifikasi. Silakan verifikasi email Anda.');
            }
        } else {
            $this->addError('email', 'Email atau password salah.');
        }
    }
    
}
