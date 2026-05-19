<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class foundedit extends Controller
{
       public function show(string $id)
    {
        foreach(Auth::user()->FoundItems as $found){
            if ($found->id==$id){
                return view('items.foundedit',['id'=>$id]);
            }
        }
        return redirect()->route('found');
    }
}
