<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Registration extends Component
{
    public $name;
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.registration');
    }
    // Updated function is for the make validate the input while the typing
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' =>'required',
            'email' =>'required|email',
            'password' =>'required|min:5',
        ]);
    }
    public function submit()
    {
        $data = new User();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->password = $this->password;
        $data->save();
        session()->flash('success', 'Record saved successfully');
        return redirect()->to('/');
    }
}
