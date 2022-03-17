<?php

namespace App\Http\Livewire;

use App\Models\Accounting;
use App\Models\Bill;
use App\Models\Item;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;


class UserBill extends Component

{
    use WithPagination;

    public $pagine=10;
    public $createModel1=false;
    public $totz='';
    public $updateModel1=false;
    public $billModel1=false;
    public $orderName,$orderStatus,$bill,$room,$billId,$quantity,$itemValue;
    public $item=[];
    public $order=[];
    public $showUpdate,$unique;

    public function addPay($total){
        Accounting::create([
            'type'=>'MONEY IN',
            'payment'=>'cash',
            'amount'=>$total,
            'description'=>'Food Bill Payment total '.$total.' All cost',
            'verification'=>'verified',
            'authorizeBy'=>Auth()->user()->name,
        ]);
        session()->flash('message', 'Data Stored successfully.');

        $this->reset();
    }


    public function showUpdate($unique)
    {
        $this->updateModel1=true;
        $this->billId = $unique;
        $az=Bill::find($this->billId);
        $this->orderName=$az->nickname;
        $this->orderStatus=$az->status;

    }

    //sho bill models
    public function showBill($unique)
    {
        $this->itemValue='';
        $this->quantity='';
        $this->billModel1=true;
        $this->billId = $unique;
        $this->order=Order::where('bill_id',$unique)->latest()->get();
        $this->item=Item::where('visible','visible')->get();


    }

    public function deleteBill($unic){
        $itemA= Item::find($unic['item_id']);
        if($itemA->visible==='not visible'){
            Item::find($unic['item_id'])->update([
                'current_stock'=> $itemA->current_stock - (int)$unic['quantity'],
                'visible'=> 'visible',
            ]);
        }else{
            Item::find($unic['item_id'])->update([
                'current_stock'=> $itemA->current_stock - (int)$unic['quantity'],
            ]);
        }
        Order::find($unic['id'])->delete();
        $this->order=Order::where('bill_id',$this->billId)->latest()->get();
        session()->flash('message', 'Data deleted successfully.');


    }

    public function submitOrder(){

        $this->validate([
            'itemValue'=>['required'],
            'quantity'=>['required'],
        ],['itemValue.required'=>"You must choose item to add to cart"]);
        $itemA=Item::find($this->itemValue);
        if(((int)$itemA->original_stock - (int)$itemA->current_stock)>$this->quantity){
            Item::find($this->itemValue)->update([
                'current_stock'=> $itemA->current_stock + (int)$this->quantity,
            ]);

            Order::create([
                'bill_id'=>$this->billId,
                'item_id'=>(int)$this->itemValue,
                'quantity'=>$this->quantity,
            ]);
            Session::flash('message','order added successfully');
            $this->order=Order::where('bill_id',$this->billId)->latest()->get();
            $this->clear();




        }elseif (((int)$itemA->original_stock - (int)$itemA->current_stock)==$this->quantity) {
            Item::find($this->itemValue)->update([
                'current_stock'=> $itemA->current_stock + (int)$this->quantity,
                'visible'=> 'not visible',
            ]);
            Order::create([
                'bill_id'=>$this->billId,
                'item_id'=>(int)$this->itemValue,
                'quantity'=>$this->quantity,
            ]);
            Session::flash('message','order added successfully');
            $this->order=Order::where('bill_id',$this->billId)->latest()->get();
            $this->clear();

        }else{
            Session::flash('message','issuficient items on stock');
            $this->order=Order::where('bill_id',$this->billId)->latest()->get();




        }

    }




    //update
    public function update(){
        $this->validate([
            'orderName'=>'required|string',
        ]);
        Bill::find($this->billId)->update([
            'nickname'=>$this->orderName,
            'authorized'=>Auth()->user()->name,
            'status'=>$this->orderStatus,
        ]);
        session()->flash('message', 'Data updated successfully.');
        $this->reset();



    }

    //for delete operations

    public function delete($unic){
        Bill::find($unic)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }

    public function showCreateModel1(){
        $this->reset();
        return $this->createModel1=true;
    }

    public function submit(){
        $this->validate([
            'orderName'=>'required|string',
        ]);
        $this->billId=Bill::create([
            'nickname'=>$this->orderName,
            'authorized'=>Auth()->user()->name,
            'status'=>'Not Delivered',
        ]);
        Session::flash('message','Order Created Successfully');
        $this->reset();

    }

    public function boot()
    {

    }

    public function clear(){
        $this->itemValue='';
        $this->quantity='';
    }

    public function cancel(){
        $this->reset();
    }



    public function render()
    {
//        $order=Order::with(['item'])->where('bill_id',$id)->latest()->get();

        $this->room=Bill::get();
        return view('livewire.user-bill',['paginator'=>Bill::latest()->paginate($this->pagine)]);
    }


}
