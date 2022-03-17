<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\customer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function __construct(){

    }
    public function index($userId,$custId)
    {
          $user=User::find($userId);
          $cu=customer::find($custId);


        $pdf = PDF::loadView('pdf.receipt1',array('user'=>$user,'cid'=>$cu))->setPaper('A8','portait');

        return $pdf->stream('room.pdf');
//        return $pdf->download('tutsmake.pdf');
    }
    public function bill($orderId){
        $order=Order::where('bill_id',$orderId)->latest()->get();
        $pdf = PDF::loadView('pdf.order',array('order'=>$order))->setPaper('A8','portait');

        return $pdf->stream('order.pdf');
    }


}
