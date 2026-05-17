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
    public $where = '';
    public $UserId = null;

    public function openModal($id){
        $this->dispatch('open-found-modal', itemid: $id);
    }    

    public function mount(){
        $this->ViewedItem =new FoundItem();
        $this->ViewedAltItem=new SoughtItem();
        $this->count=FoundItem::count();
        if($this->UserId){
            $this->count=FoundItem::where('user_id', $this->UserId)->count();
        }
    }
    public function found(){
        if($this->UserId){
            return FoundItem::where('name','like','%'.$this->where.'%')->where('user_id', $this->UserId)->paginate(5, ['*'], "found");
        }
        return FoundItem::where('name','like','%'.$this->where.'%')->paginate(5, ['*'], "found");
    }
    public function deleteFound(int $id){
        FoundItem::find($id)->delete();
        $this->ViewingAltItemModal = false;
        $this->ViewingItemModal = false;
    }
    public function render()
    {
        return view('livewire.found');
    }
}
