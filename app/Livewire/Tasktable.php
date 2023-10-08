<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Save;
class Tasktable extends Component
{
    public function render()
    {
        $getpacient=Save::where('user_id',auth()->user()->id)->get();
        return view('livewire.tasktable', compact('getpacient'));
    }
}
