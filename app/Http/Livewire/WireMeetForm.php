<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WireMeetForm extends Component
{
    public $name, $begin;

    public function render()
    {
        return view('livewire.wire-meet-form');
    }
}
