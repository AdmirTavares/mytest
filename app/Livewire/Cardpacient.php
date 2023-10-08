<?php

namespace App\Livewire;

use App\Models\Pacient;
use App\Models\Save;
use Livewire\Component;

class Cardpacient extends Component
{
public function delete($id){
    Pacient::findOrfail($id)->delete();
    $this->modal_s('Congratulations','successfully made');
}

    public function render()
    {
       
        
       $getpacient= Pacient::where('user_id',auth()->user()->id)->get();
        return view('livewire.cardpacient', compact('getpacient'));
    }
}
