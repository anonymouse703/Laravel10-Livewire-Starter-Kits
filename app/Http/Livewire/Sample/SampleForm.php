<?php

namespace App\Http\Livewire\Sample;

use Livewire\Component;
use App\Models\Sample;

class SampleForm extends Component
{
    public $sampleId, $name;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'sampleId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.sample.sample-form');
    }

    //edit
    public function sampleId($sampleId){
        // dd($sampleId);
        $this->sampleId = $sampleId;
        $samples = Sample::whereId($sampleId)->first();
        $this->name = $samples->name;
       
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'name' => 'required',
        ]);
        if ($this->sampleId) {
            Sample::whereId($this->sampleId)->first()->update($data);
            $action = 'edit';
            $message = 'Sample Record Successfully Updated';
        } else {
            Sample::create($data);
            $action = 'store';
            $message = 'Sample Record Successfully Updated';
        }
        $this->emit('showEmitedFlashMessage', $action, $message); //padala sa flash component
        $this->resetInputFields(); //reset input sa modal form
        $this->emit('closeSampleModal'); //close sample modal
        $this->emit('refreshParentSample'); //refresh parent list
    }
}
