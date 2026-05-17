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
    public $where = "";
    public $UserId = null;
    public function openModal($id){
        $this->dispatch('open-sought-modal', itemid: $id);
    }

    public function mount(){
        $this->count=SoughtItem::count();
        if($this->UserId){
            $this->count=SoughtItem::where('user_id', $this->UserId)->count();
        }
    }
    public function sought(){
        if($this->UserId){
            return SoughtItem::where('name','like','%'.$this->where.'%')->where('user_id', $this->UserId)->paginate(5, ['*'], "found");
        }
        return SoughtItem::where('name','like','%'.$this->where.'%')->paginate(5, ['*'], "sought");
    }
    public function render()
    {
        return view('livewire.search');
    }
}
