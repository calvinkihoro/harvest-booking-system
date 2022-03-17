<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public $data;
    public $unic='';

    public function addData(Request $request,$id){
      $request->validate([
          'item'=>['required'],
          'quantity'=>['required'],
      ],['item.required'=>"You must choose item to add to cart"]);
      $itemA=Item::find($request->item);
      if(((int)$itemA->original_stock - (int)$itemA->current_stock)>$request->quantity){
          Item::find($request->item)->update([
             'current_stock'=> $itemA->current_stock + (int)$request->quantity,
          ]);

          Order::create([
              'bill_id'=>$id,
              'item_id'=>(int)$request->item,
              'quantity'=>$request->quantity,
          ]);
          return redirect()->back()->with('message','order added successfully');



      }elseif (((int)$itemA->original_stock - (int)$itemA->current_stock)==$request->quantity) {
          Item::find($request->item)->update([
              'current_stock'=> $itemA->current_stock + (int)$request->quantity,
              'visible'=> 'not visible',
          ]);
          Order::create([
              'bill_id'=>$id,
              'item_id'=>$request->item,
              'quantity'=>$request->quantity,
          ]);
          return redirect()->back()->with('message','order added successfully');

      }else{
          return redirect()->back()->with('message','issuficient items on stock');

      }



    }
    public function index($id){
        $this->unic=$id;
        $item=Item::where('visible','visible')->get();
        $order=Order::with(['item'])->where('bill_id',$id)->latest()->get();
        return view('admin.order.index',['item'=>$item,'id'=>$id,'order'=>$order]);
    }

}
