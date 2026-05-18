<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FoundItem;
use Livewire\Attributes\On;

class FoundModal extends Component
{
    public $ViewingItemModal=false;
    public FoundItem $ViewedItem;
    
    #[On('open-found-modal')]
    public function updatePostList($itemid)
    {
        $this->ViewingItemModal=true;
        $this->ViewedItem=FoundItem::find($itemid);
    }
    public function openModal($id){
        $this->ViewingItemModal = false;
        $this->dispatch('open-sought-modal',itemid:$id);
    }
    public function deleteFound(int $id){
        $this->ViewingItemModal = false;
        FoundItem::find($id)->delete();  
    }
    public function editFound(int $id){
        return redirect()->route('foundedit', ['id' => $id]);
    }
    public function mount(){
        $this->ViewedItem =new FoundItem();
    }
    public function render()
    {
        return view('livewire.found-modal');
    }
}
