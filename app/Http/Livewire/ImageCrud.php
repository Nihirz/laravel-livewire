<?php

namespace App\Http\Livewire;

use App\Models\ImageCrud as ModelsImageCrud;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
class ImageCrud extends Component
{
     public $showData = true;
    public $createData = false;
    public $updateData = false;

    public $title;
    public $image;

    public $edit_id;
    public $edit_title;
    public $old_image;
    public $new_image;

    public function render()
    {
        $images = ModelsImageCrud::orderBy('id', 'DESC')->get();
        return view('livewire.image-crud', ['images' => $images])->layout('layouts.app');
    }


    public function resetField()
    {
        $this->title = "";
        $this->image = "";
        $this->edit_title = "";
        $this->new_image = "";
        $this->old_image = "";
        $this->edit_id = "";
    }

    public function showForm()
    {
        $this->showData = false;
        $this->createData = true;
    }

    use WithFileUploads;
    public function create()
    {
        $images = new ModelsImageCrud();
        $this->validate([
            'title' => 'required',
            'image' => 'required'
        ]);

        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('posts', 'public');
        } else {
            $filename = Null;
        }

        $images->title = $this->title;
        $images->image = $filename;
        $result = $images->save();
        if ($result) {
            session()->flash('success', 'Add Successfully');
            $this->resetField();
            $this->showData = true;
            $this->createData = false;
        } else {
            session()->flash('error', 'Not Add Successfully');
        }
    }

    public function edit($id)
    {
        $this->showData = false;
        $this->updateData = true;
        $images = ModelsImageCrud::findOrFail($id);
        $this->edit_id = $images->id;
        $this->edit_title = $images->title;
        $this->old_image = $images->image;
    }

    public function update($id)
    {
        $images =ModelsImageCrud::findOrFail($id);
        $this->validate([
            'edit_title' => 'required',
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$images->image);
        if ($this->new_image != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_image->store('posts', 'public');
        } else {
            $filename = $this->old_image;
        }

        $images->title = $this->edit_title;
        $images->image = $filename;
        $result = $images->save();
        if ($result) {
            session()->flash('success', 'Update Successfully');
            $this->resetField();
            $this->showData = true;
            $this->updateData = false;
        } else {
            session()->flash('error', 'Not Update Successfully');
        }
    }

    public function delete($id)
    {
        $images=ModelsImageCrud::findOrFail($id);
        $destination=public_path('storage\\'.$images->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$images->delete();
        if ($result) {
            session()->flash('success', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }

    }
}
