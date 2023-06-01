<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 2;
    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function multiply()
    {
        $this->count *= 2;
    }
    
    public function divide()
    {
        $this->count /= 2;
    }
   
    public function round(){
        $this->count = '';
    }

    public function restore(){
        $this->count = 2;
    }
    

    public function render()
    {
        return view('livewire.counter');
    }
}
