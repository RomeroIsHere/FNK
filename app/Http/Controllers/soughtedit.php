<?php

namespace App\Http\Controllers;

use App\Models\SoughtItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class soughtedit extends Controller
{
       public function show(string $id)
    {
        foreach(Auth::user()->SoughtItems as $found){
            if ($found->id==$id){
                return view('items.soughtedit',['id'=>$id]);
            }
        }
        return redirect()->route('sought');
    }
}
