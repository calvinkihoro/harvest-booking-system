<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MakeBooking extends Controller
{
    public function store(Request $request){
        $request->validate([
          'fname' => ['required','string','min:5','max:50'],
          'checkIn' => ['required'],
          'type' => ['required'],
          'checkOut' => ['required'],
          'adult' => ['required','min:0'],
          'child' => ['required','min:0'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:12'],
        ]);


        Booking::create(
            [
                'fullname'=>$request->get('fname'),
                'email'=>$request->get('email'),
                'phone'=>$request->get('phone'),
                'adultsNo'=>$request->get('adult'),
                'childrenNo'=>$request->get('child'),
                'checkin'=>$request->get('checkIn'),
                'checkout'=>$request->get('checkOut'),
                'type'=>$request->get('type'),
                'rooms'=>1,

            ]);

        //send email and message
        return redirect('/')->with('message','Your Request sent you will be contacted soon');
    }
}
