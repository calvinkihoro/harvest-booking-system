<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\room;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class BlogPosts extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $img;
    public $rooms;
//for image name
    public $imageName = [];
//for image name
    public $updateIdz;
    public $updateData;
    public $heading;
    public $postType;
    public $images;
    public $description;
    public $pagine = 10;
    public $createModel1 = false;
    public $updateModel1 = false;


    //ids
    public $unic;


    //update models
    public function showUpdate($unique)
    {
        $this->updateIdz = $unique;
        $this->updateModel1 = true;
        $this->updateData = Blog::find($unique);
        $this->heading = $this->updateData->heading;
        $this->postType = $this->updateData->status;
        $this->description = $this->updateData->description;
    }


    //update
    public function update()
    {
        $this->validate([
            'heading' => 'required|string',
            'postType' => 'required',
            'description' => 'required|min:50',
        ]);
        Blog::find($this->updateIdz)->update([
            'heading' => $this->heading,
            'description' => $this->description,
            'status' => $this->postType,

        ]);
        $this->updateModel1 = false;
        session()->flash('message', 'Post updated successfully.');

    }

    //for delete operations

    public function delete($unic)
    {
        Blog::find($unic)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }

    public function showCreateModel1()
    {
        $this->reset();
        return $this->createModel1 = true;
    }

    public function submit()
    {
        $this->validate([
            'heading' => 'required|string',
            'postType' => 'required',
            'images' => 'image|mimes:jpg,png,jpeg,gif,svg|sometimes',
            'description' => 'required|min:50',
        ]);

            $this->imageName = md5($this->images. microtime()) . time() . '.' . $this->images->extension();
            $this->images = $this->images->storeAs('public/posts', $this->imageName);


        Blog::create([
            'heading' => $this->heading,
            'description' => $this->description,
            'status' => $this->postType,
            'image' => $this->imageName,
            'postedBy'=>"Harvest Hotel"
        ]);
        $this->reset();

        session()->flash('message', 'Blog Posts added successfully.');
        return redirect()->back();


    }

    public function boot()
    {

    }

    public function clear()
    {
        $this->heading = '';
        $this->price = '';
        $this->postType = '';
        $this->images = '';
        $this->description = '';
    }

    public function cancel()
    {
        $this->reset();
    }



    public function render()
    {

        $this->rooms = Blog::get();
        return view('livewire.blog-posts', ['paginator' => Blog::latest()->paginate($this->pagine)]);
    }
}
