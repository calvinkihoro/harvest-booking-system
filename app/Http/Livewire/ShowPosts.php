<?php

namespace App\Http\Livewire;

use App\Models\Accounting;
use App\Models\customer;
use App\Models\room;
use App\Models\RoomAllocation;
use App\Models\User;
use App\Models\UserHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $pagine=10;
    public $client="";
    public $fname,$mname,$lname,$email,$gender,$phone,$userType,$updateData,$uniqueUser,$bookingId,$fullName,$idx;
    public $days;
    public $address,$arrivingFrom,$occupation,$roomAv,$paymentType,$paymentVer,$accountId;
    public $customers,$customersId,$customersPrice,$totalCost;
    public $rooms=[];

    //show models
    public $createModel=false;
    public $updateModel=false;
    public $bookingModel=false;
    public $accountingModel=false;


    public function showAccount($unique){
        $this->createModel=false;
        $this->accountingModel=true;
        $this->accountId=$unique;
        $this->customersId=(int)room::where('room_no',$this->roomAv)->get()->toArray()[0]['id'];
        $this->customersPrice=(float)room::where('room_no',$this->roomAv)->get()->toArray()[0]['price'];

        $this->totalCost=$this->customersPrice * $this->days;


    }
    public function addAccount(){

        $this->validate([
            'totalCost' => ['required'],
            'paymentType' => ['required'],
            'paymentVer' => ['required'],
            ],[
                'paymentVer.required'=>'Payment verification is required',
                'paymentType.required'=>'Payment Method is Required'
        ]);

        $date1 = Carbon::now();
        $date = $date1->addDays($this->days);
        RoomAllocation::create([
            'customer_id'=>$this->accountId,
            'room_id'=>$this->customersId,
            'fromDate'=>$date1,
            'toDate'=>$date,
        ]);

            Accounting::create([
                'type'=>'MONEY IN',
                'payment'=>$this->paymentType,
                'amount'=>$this->totalCost,
                'description'=>'Room '.$this->roomAv.' Booking for '.$this->days.' days',
                'verification'=>$this->paymentVer,
                'authorizeBy'=>Auth()->user()->name,
            ]);
            room::find($this->customersId)->update([
                    'bookingStatus'=>'booked',
                ]);


        Session::flash('status','Booking Process is Sucessfully');
        $this->reset();
        $this->accountingModel=false;


//        dd($date);

//        dd($this->customersId);
    }

    public function showUpdate($unique)
    {
       $this->updateModel=true;
       $this->uniqueUser=$unique;
       $this->updateData=User::find($unique);
       $this->fname=$this->updateData->fname;
       $this->mname=$this->updateData->mname;
       $this->lname=$this->updateData->lname;
       $this->email=$this->updateData->email;
       $this->userType=$this->updateData->role;
       $this->phone=$this->updateData->phone;
    }


    public function update()
    {
        $this->validate([
            'fname' => ['required', 'string','min:2', 'max:255'],
            'lname' => ['required', 'string','min:2', 'max:255'],
            'mname' => ['required', 'string','min:2', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($this->uniqueUser)],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:12'],

        ]);

        User::find($this->uniqueUser)->update([
            'name' => $this->fname.' '.$this->mname.' '.$this->lname,
            'fname'=>$this->fname,
            'lname'=>$this->lname,
            'mname'=>$this->mname,
            'phone' =>$this->phone,
            'email' =>$this->email,
        ]);

        Session::flash('status','User Data updated sucessfully');
        $this->reset();
    }

    public function save(){
        $this->validate([
            'fname' => ['required', 'string','min:2', 'max:255'],
            'lname' => ['required', 'string','min:2', 'max:255'],
            'mname' => ['required', 'string','min:2', 'max:255'],
            'gender' => ['required'],
            'email' => ['string', 'email', 'max:255', 'unique:users','sometimes'],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:12'],
            'address' => ['required', 'string'],
            'arrivingFrom' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'roomAv' => ['required','string'],
            'days'=>['required','min:1'],
        ],['roomAv.required'=>'You Need To Choose a room']);

        $user=User::create([
            'name' => $this->fname.' '.$this->mname.' '.$this->lname,
            'fname'=>$this->fname,
            'lname'=>$this->lname,
            'mname'=>$this->mname,
            'email' =>$this->email,
            'phone' =>$this->phone,
            'gender' =>$this->gender,
            'password' =>Hash::make('12345678'),
    ]);
        $date1 = Carbon::now();
        $date = $date1->addDays($this->days);
        $customer=customer::create([
            'address'=>$this->address,
            'arrivingFrom'=>$this->arrivingFrom,
            'occupation'=>$this->occupation,
            'numberOfDays'=>$this->days,
            'user_id'=>$user->id,
            'lastDate'=>$date,
            'added_by'=>auth()->user()->name,
        ]);
        $this->showAccount($customer->id);

    }

    public function clear(){

        $this->fname='';
        $this->mname='';
        $this->lname='';
        $this->email ='';
        $this->phone='';
        $this->userType='';
    }

    public function cancel(){
        $this->reset();
    }


    public function showCreateModel(){
        $this->rooms=room::where('bookingStatus','free')->get();
        $this->clear();
        return $this->createModel=true;
    }


    public function delete($good){
        UserHistory::create([
            'username'=>User::find($good)->name,
            'phone'=>User::find($good)->phone,
        ]);
        $idOg=User::find($good)->id;

        $idCust=customer::select('id')->where('user_id', $idOg)->get()[0]->toArray()['id'];
        $idRoom=RoomAllocation::where('customer_id',$idCust)->get()[0]->toArray()['room_id'];
        room::find($idRoom)->update(['bookingStatus'=>'free']);
        User::find($good)->delete();
    }

    public function render()
    {
//        $this->client = User::where('onlineUser',0)->latest()->get();
        return view('livewire.show-posts',['paginator'=>User::with('customer')->where('onlineUser',0)->latest()->paginate($this->pagine)]);
    }

}
