<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $nama;
    public $email;

    public function __construct()
    {
        $user = Auth::user();
        $this->nama = $user ? $user->name : 'Anonim';
        $this->email = $user ? $user->email : 'anonim@example.com';
    }

    public function render()
    {
        return view('components.navbar');
    }
}
