<?php

namespace App\Livewire;

use App\Models\SoughtItem;
use Livewire\Component;

class Soughtedit extends Component
{
    public $id;
    public $found;
    public $name="";
    public $desc="";
    public $confirmingDeletion=false;
    public function save(){
        $this->found->name=$this->name;
        $this->found->description=$this->desc;
        $this->found->save();
    }
    public function delete(){
        $this->found->delete();
        return redirect()->route('found');
    }
    public function mount(){
        $this->found=SoughtItem::find($this->id);
        $this->name=$this->found->name;
        $this->desc=$this->found->description;
    }
    public function render()
    {
        return view('livewire.soughtedit');
    }
}
