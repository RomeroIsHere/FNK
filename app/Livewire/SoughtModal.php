<?php

namespace App\Livewire;

use App\Models\SoughtItem;
use Livewire\Attributes\On;
use Livewire\Component;

class SoughtModal extends Component
{
    public $ViewingItemModal=false;
    public SoughtItem $ViewedItem;
    #[On('open-sought-modal')]
    public function updatePostList($itemid)
    {
        $this->ViewingItemModal=true;
        $this->ViewedItem=SoughtItem::find($itemid);
    }
    public function openModal($id){
        $this->ViewingItemModal = false;
        $this->dispatch('open-found-modal',itemid:$id);
    }
    public function deleteSought(int $id){
        $this->ViewingItemModal = false;
        SoughtItem::find($id)->delete();  
    }
    public function mount(){
        $this->ViewedItem =new SoughtItem();
    }
    public function render()
    {
        return view('livewire.sought-modal');
    }
}
