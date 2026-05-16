<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use App\Models\FoundItem;
use App\Models\SoughtItem;
use Livewire\Component;
use Livewire\WithPagination;

class Found extends Component
{
    #[Url]
    public $sought= '';
    use WithPagination;
    public $datos =[];
    public $count = 0;

    public $ViewingItemModal = false;
    public $ViewingAltItemModal= false;
    public FoundItem $ViewedItem;
    public SoughtItem $ViewedAltItem;
    public function openModal($id){
        $this->ViewedItem = FoundItem::find($id);
        $this->ViewingItemModal = true;
        $this->ViewingAltItemModal = false;
    }
    public function openSoughtModal($id){
        $this->ViewedAltItem = SoughtItem::find($id);
        $this->ViewingAltItemModal = true;
        $this->ViewingItemModal = false;
    }

    public function mount(){
        $this->ViewedItem =new FoundItem();
        $this->ViewedAltItem=new SoughtItem();
        $this->count=FoundItem::count();
    }
    public function found(){
        return FoundItem::paginate(5, ['*'], "found");
    }
    public function render()
    {
        return view('livewire.found');
    }
}
