<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\room;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddStock extends Component
{

    use WithFileUploads;
    use WithPagination;


    public $images,$itemName,$itemType,$price,$quantity,$updateIdz,$rooms,$imageName,$updateData,$stock;
    public $visStatus='Visible';


    public $pagine=10;
    public $createModel1=false;
    public $updateModel1=false;
    public $updateModel2=false;


    //ids
    public $unic;


    //update models
    public function showUpdate($unique)
    {
        $this->updateIdz=$unique;
        $this->updateModel1=true;
        $this->updateData=Item::find($unique);
        $this->itemName=$this->updateData->itemName;
        $this->price=$this->updateData->amount;
        $this->itemType=$this->updateData->type;
        $this->visStatus=$this->updateData->visible;
        $this->quantity=$this->updateData->original_stock;

    }


    //update models
    public function showUpdate1($unique)
    {
        $this->quantity=0;
        $this->updateIdz=$unique;
        $this->updateModel2=true;

        $this->updateData=Item::find($unique);
        $this->stock=$this->updateData->original_stock;

    }


    public function update1(){
        $this->validate([
            'quantity'=>'required|min:0',
        ]);
        $all=(int)($this->stock + $this->quantity);

        Item::find($this->updateIdz)->update([
            'original_stock' => $all,
        ]);
        $this->updateModel2=false;
        session()->flash('message', 'Item updated successfully.');

    }

    //update
    public function update(){
        $this->validate([
            'itemName'=>['required','string','sometimes', Rule::unique('Items')->ignore($this->updateIdz)],
            'itemType'=>'required|string',
            'price'=>'required|min:0',
            'quantity'=>'required|min:0',

        ]);
        Item::find($this->updateIdz)->update([
            'itemName'=> $this->itemName,
            'amount'=> $this->price,
            'type'=>$this->itemType,
            'visible'=>$this->visStatus,
            'original_stock' => $this->quantity,
        ]);
        $this->updateModel1=false;
        session()->flash('message', 'Item updated successfully.');

    }

    //for delete operations

    public function delete($unic){
        Item::find($unic)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }

    public function showCreateModel1(){
        $this->reset();
        return $this->createModel1=true;
    }

    public function submit(){
        $this->validate([
            'itemName'=>'required|string|unique:items',
            'itemType'=>'required|string',
            'price'=>'required|min:0',
            'quantity'=>'required|min:0',
            'images' => 'image|mimes:jpg,png,jpeg,gif,svg|sometimes',
        ]);

            $this->imageName=md5( $this->images . microtime()).time().'.'.$this->images->extension();
            $this->images = $this->images->storeAs('public/stockImage', $this->imageName);

            Item::create([
            'itemName'=> $this->itemName,
            'amount'=> $this->price,
            'photo'=> $this->imageName,
            'type'=>$this->itemType,
            'visible'=>$this->visStatus,
            'current_stock' => 0,
            'original_stock' => $this->quantity,

        ]);
        $this->reset();

        session()->flash('message', 'Item added successful');
        return redirect()->back();


    }

    public function boot()
    {

    }

    public function clear(){
        $this->itemName='';
        $this->price='';
        $this->quantity='';
        $this->images ='';
    }

    public function cancel(){
        $this->reset();
    }


    public function render()
    {
        $this->rooms=Item::get();
        return view('livewire.add-stock',['paginator'=>Item::latest()->paginate($this->pagine)]);
    }
}
