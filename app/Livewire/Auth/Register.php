<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Attributes\Title;

#[Title('Register')]
class Register extends Component
{
    public $email, $name, $password, $password_confirmation;

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'name' => 'required|string|min:3|max:255',
        'password' => 'required|string|min:6|confirmed',
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'name.required' => 'Nama wajib diisi.',
        'name.string' => 'Nama harus berupa teks.',
        'name.min' => 'Nama harus memiliki minimal 3 karakter.',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.min' => 'Kata sandi harus memiliki minimal 6 karakter.',
        'password.confirmed' => 'Konfirmasi Kata sandi tidak cocok.',
        'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
        'password_confirmation.string' => 'Konfirmasi password harus berupa teks.',
        'password_confirmation.min' => 'Konfirmasi password harus memiliki minimal 6 karakter.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        sleep(2);
        $this->validate();
        $user=User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> Hash::make($this->password)
        ]);
        Auth::login($user);
        event(new Registered($user));
        $route=route('registered');
        $message='Dafar akun berhasil, hubungi Admin E-KUIS untuk memverifikasi email anda!';
        $this->dispatch('success', ['message' => $message, 'route'=>$route]);
    }

    public function render()
    {
        return view('pages.auth.register');
    }
}
