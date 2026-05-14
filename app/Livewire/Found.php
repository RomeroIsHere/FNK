<?php

namespace App\Livewire;

use App\Models\FoundItem;
use Livewire\Component;
use Livewire\WithPagination;

class Found extends Component
{
    use WithPagination;
    public $datos =[];
    public $count = 0;
    public function mount(){
        $this->count=FoundItem::count();
    }
    public function found(){
        return FoundItem::paginate(5);
    }
    public function render()
    {
        return view('livewire.found');
    }
}
