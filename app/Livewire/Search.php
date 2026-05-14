<?php

namespace App\Livewire;

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
    public function mount(){
        $this->count=SoughtItem::count();
    }
    public function sought(){
        return SoughtItem::paginate(5, ['*'], "sought");
    }

    public function render()
    {
        return view('livewire.search');
    }
}
