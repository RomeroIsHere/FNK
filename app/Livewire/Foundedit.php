<?php

namespace App\Livewire;

use App\Models\FoundItem;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Foundedit extends Component
{
    use InteractsWithBanner;

    public $id;
    public $found;
    public $name="";
    public $desc="";
    public $confirmingDeletion=false;
    public function save(){
        $this->found->name=$this->name;
        $this->found->description=$this->desc;
        $this->found->save();
        $this->banner('Item Saved.');
    }
    public function delete(){
        $this->found->delete();
        return redirect()->route('found');
    }
    public function mount(){
        $this->found=FoundItem::find($this->id);
        $this->name=$this->found->name;
        $this->desc=$this->found->description;
    }
    public function render()
    {
        return view('livewire.foundedit');
    }
}
