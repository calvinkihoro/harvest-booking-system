<?php

namespace App\Http\Livewire;

use App\Models\room;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowRoom extends Component

{
    use WithFileUploads;
    use WithPagination;


    public $img;
    public $rooms;
    public $roomStatus='free';
//for image name
    public $imageName=[];
//for image name
    public $updateIdz;
    public $phone;
    public $updateData;
    public $room_no;
    public $price;
    public $roomType;
    public $images =  [];
    public $description;
    public $pagine=10;
    public $createModel1=false;
    public $updateModel1=false;


    //ids
    public $unic;


    //update models
    public function showUpdate($unique)
    {
        $this->updateIdz=$unique;
        $this->updateModel1=true;
        $this->updateData=room::find($unique);
        $this->room_no=$this->updateData->room_no;
        $this->price=$this->updateData->price;
        $this->roomType=$this->updateData->roomType;
        $this->description=$this->updateData->description;
        $this->roomStatus=$this->updateData->bookingStatus;
        $this->phone=$this->updateData->phone;
    }


    //update
    public function update(){
        $this->validate([
            'price'=>'required',
            'phone'=>'required',

            'roomType'=>'required',
            'description'=>'required|min:20',
        ]);
        room::find($this->updateIdz)->update([
            'description'=> $this->description,
            'price'=> $this->price,
            'roomType'=>$this->roomType,
            'bookingStatus'=>$this->roomStatus,
        ]);
        $this->updateModel1=false;
        session()->flash('message', 'room updated successfully.');

    }

    //for delete operations

    public function delete($unic){
        room::find($unic)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }

    public function showCreateModel1(){
        $this->reset();
        return $this->createModel1=true;
    }

    public function submit(){
        $this->validate([
             'room_no'=>'required|string|unique:rooms',
             'price'=>'required',
             'phone'=>'required',
             'roomType'=>'required',
             'images.*' => 'image|mimes:jpg,png,jpeg,gif,svg|sometimes',
            'description'=>'required|min:20',
        ]);

        foreach ($this->images as $key => $image) {
            $this->imageName[$key]=md5( $this->images[$key] . microtime()).time().'.'.$this->images[$key]->extension();
            $this->images[$key] = $image->storeAs('public/roomimages', $this->imageName[$key]);


        }

        $this->images =json_encode($this->imageName);
        room::create([
            'room_no'=> $this->room_no,
            'description'=> $this->description,
            'price'=> $this->price,
            'roomType'=>$this->roomType,
            'images' => $this->images,
            'phone' => $this->phone,
            'bookingStatus'=>$this->roomStatus,
            ]);
        $this->reset();

        session()->flash('message', 'Room added successfully.');
        return redirect()->back();


    }

    public function boot()
    {

    }

    public function clear(){
  $this->room_no='';
  $this->price='';
  $this->roomType='';
  $this->images ='';
  $this->description='';
    }

    public function cancel(){
        $this->reset();
    }

    public function render()
    {
        $this->rooms=room::get();
        return view('livewire.show-room',['paginator'=>room::latest()->paginate($this->pagine)]);
    }


}
