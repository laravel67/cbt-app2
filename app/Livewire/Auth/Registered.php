<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Registered')]
class Registered extends Component
{
    public function render()
    {
        return view('pages.auth.registered');
    }
}
