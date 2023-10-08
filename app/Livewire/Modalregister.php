<?php

namespace App\Livewire;

use App\Models\Pacient;
use Illuminate\Support\Sleep;
use Livewire\Component;
use Livewire\Attributes\Rule;


class Modalregister extends Component
{
    
    #[rule('required|max:255')]
    public $name='';
    #[rule('required|max:255')]
    public $surname='';
    #[rule('required|max:255')]
    public $birth='';
    #[rule('required|max:255')]
    public $placebirth='';
    #[rule('required|max:255')]
    public $address='';
    #[rule('required|max:255')]
    public $zipcode='';
    #[rule('required|max:255')]
    public $city='';
   
   
   

    public function pacientregister(){
       Sleep(2);
       if($aux=$this->validate()){
        Pacient::create(array_merge($aux, ['user_id' => auth()->user()->id]));
        $this->reset();
        return $this->modal_s('Congratulations','Registration successfully made');
      
       }
       else
       {
        return $this->modal_w('Attention,','you need to properly fill out the fields');

       }
     
    }
    public function render()
    {
        return view('livewire.modalregister');
    }
}
