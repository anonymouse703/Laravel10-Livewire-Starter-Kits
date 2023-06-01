<?php

namespace App\Http\Livewire\Flash;

use Livewire\Component;

class FlashMessage extends Component
{
    public $message;

    protected $listeners = [
        'showEmitedFlashMessage'
    ];

    public function render()
    {
        return view('livewire.flash.flash-message');
    }
    public function showEmitedFlashMessage($action, $message)
    {
        $this->message = $message;

        if ($action == 'store') {
            session()->flash('success', $this->message);
        } elseif ($action == 'edit') {
            session()->flash('info', $this->message);
        } elseif ($action == 'refill') {
            session()->flash('refill', $this->message);
        } elseif ($action == 'delete') {
            session()->flash('delete', $this->message);
        } elseif ($action == 'outofstock') {
            session()->flash('outofstock', $this->message);
        } elseif ($action == 'delete') {
            session()->flash('delete', $this->message);
        } elseif ($action == 'warning') {
            session()->flash('warning', $this->message);
        } else {
            session()->flash('error', 'Record Store/Updated Unsuccessfully');
        }
    }
    
}?>
