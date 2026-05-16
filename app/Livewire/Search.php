<?php

namespace App\Livewire;

use App\Models\FoundItem;
use Livewire\Attributes\Url;
use App\Models\SoughtItem;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    #[Url]
    public $found= '';
    use WithPagination;
    public $datos =[];
    public $count = 0;
    public $UserId = null;

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
        $this->count=SoughtItem::count();
        if($this->UserId){
            $this->count=SoughtItem::where('user_id', $this->UserId)->count();
        }
    }
    public function sought(){
        if($this->UserId){
            return SoughtItem::where('user_id', $this->UserId)->paginate(5, ['*'], "found");
        }
        return SoughtItem::paginate(5, ['*'], "sought");
    }

    public function render()
    {
        return view('livewire.search');
    }
}
