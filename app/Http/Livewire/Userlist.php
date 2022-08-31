<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Userlist extends Component
{
    public $data;
    public function render()
    {
        $data = Product::all();
        return view('livewire.userlist', ['data'=>$data]);
    }
}
