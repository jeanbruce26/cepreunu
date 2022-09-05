<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Terminos extends Component
{
    public $check;

    protected $rules = [
        'check' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function terminos()
    {
        $data = $this->validate();

        return redirect()->route('usuario-sede');
    }

    public function render()
    {
        return view('livewire.terminos');
    }
}
