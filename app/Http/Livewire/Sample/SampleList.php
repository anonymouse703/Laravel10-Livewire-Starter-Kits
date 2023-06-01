<?php

namespace App\Http\Livewire\Sample;

use Livewire\Component;
use App\Models\Sample;
use Livewire\WithPagination;

class SampleList extends Component
{
    use WithPagination;

    public $sampleId; //fillables
    protected $paginationTheme = 'bootstrap';  //use for livewire datatable
    public $search = ''; //for search bar
   

    protected $listeners = [
        'refreshParentSample' => '$refresh',
        'deleteSample',
        'editSample',
        'deleteConfirmSample'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (empty($this->search)) {
            $samples  = Sample::paginate(10);
        } else {
            $samples  = Sample::where('name', 'LIKE', '%' . $this->search . '%')->paginate(10);
        }

        return view('livewire.sample.sample-list',[
            'samples' => $samples
        ]);
    }

    public function createSample(){
        $this->emit('resetInputFields'); 
        $this->emit('openSampleModal');
    }

    public function editSample($sampleId){
        
        $this->sampleId = $sampleId;
        $this->emit('sampleId', $this->sampleId);
        $this->emit('openSampleModal');
    }

    public function deleteConfirmSample($sampleId)
    {
        $this->dispatchBrowserEvent('confirmSampleDelete', [
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'icon' => 'warning',
            'showCancelButton' => true,
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'confirmButtonText' => 'Yes, delete it!',
            'id' => $sampleId
        ]);
        
    }

    public function deleteSample($sampleId)
    {
        Sample::destroy($sampleId);
        $this->emit('refreshParentSample');
        $this->resetPage();
    }
}
