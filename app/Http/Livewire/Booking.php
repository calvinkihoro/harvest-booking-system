<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;
    public $pagine=10;
    public function render()
    {
        return view('livewire.booking',[
        'paginator'=>\App\Models\Booking::latest()->paginate($this->pagine)]);
    }
}
