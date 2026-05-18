<?php

namespace App\Livewire\New;

use App\Models\FoundItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Found extends Component
{
    public FoundItem $found;
    public $name="";
    public $desc="";
    public $confirmingDeletion=false;
    public function save(){
        $this->found->name=$this->name;
        $this->found->description=$this->desc;
        $this->found->user_id=Auth::id();
        $this->found->save();
        return redirect(request()->header('Referer'));
    }
    public function delete(){
        return redirect()->route('found');
    }
    public function mount(){
        $this->found=new FoundItem;
        $this->name=$this->found->name;
        $this->desc=$this->found->description;
    }
    public function render()
    {
        return view('livewire.new.found');
    }
}
