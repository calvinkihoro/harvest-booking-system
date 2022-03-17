<?php

namespace App\Http\Livewire;

use App\Models\Accounting;
use App\Models\customer;
use App\Models\room;
use App\Models\RoomAllocation;
use App\Models\StaffRecord;
use App\Models\User;
use App\Models\UserHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Staff extends Component
{
    use WithPagination;

    public $pagine=10;
    public $client="";
    public $fname,$mname,$lname,$email,$gender,$phone,$dob,$position,$salary,$address,$fullName,$idx,$uniqueUser,$updateData;

    //show models
    public $createModel=false;
    public $updateModel=false;
    public $bookingModel=false;
    public $accountingModel=false;

public function showCreateModel(){
    $this->createModel=true;
}

    public function clear(){

        $this->fname='';
        $this->mname='';
        $this->lname='';
        $this->email ='';
        $this->gender ='';
        $this->phone='';
        $this->salary='';
        $this->address='';
        $this->dob='';
    }

    public function cancel(){
        $this->reset();
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
        $this->gender=$this->updateData->gender;
        $this->phone=$this->updateData->phone;
        $this->dob=$this->updateData->staff->dob;
        $this->position=$this->updateData->staff->current_position;
        $this->salary=$this->updateData->staff->current_salary;
        $this->address=$this->updateData->staff->home_address;
    }

public function save(){
    $this->validate([
        'fname' => ['required', 'string','min:2', 'max:255'],
        'lname' => ['required', 'string','min:2', 'max:255'],
        'mname' => ['required', 'string','min:2', 'max:255'],
        'gender' => ['required'],
        'salary' => ['required'],
        'position' => ['required'],
        'dob' => ['required'],
        'address' => ['required'],
        'email' => ['string', 'email', 'max:255', 'unique:users','sometimes'],
        'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:12'],
    ]);
    //adding to users table
    $user=User::create([
        'onlineUser'=>1,
        'role'=>'worker',
        'name' => $this->fname.' '.$this->mname.' '.$this->lname,
        'fname'=>$this->fname,
        'lname'=>$this->lname,
        'mname'=>$this->mname,
        'email' =>$this->email,
        'phone' =>$this->phone,
        'gender' =>$this->gender,
        'password' =>Hash::make('12345678'),
    ]);
    StaffRecord::create([
        'user_id'=>$user->id,
        'dob'=>$this->dob,
        'current_position'=>$this->position,
        'current_salary'=>$this->salary,
        'home_address'=>$this->address,
    ]);
$this->reset();
}

    public function delete($good){
        User::find($good)->delete();
    }


public function update(){
    $this->validate([
        'fname' => ['required', 'string','min:2', 'max:255'],
        'lname' => ['required', 'string','min:2', 'max:255'],
        'mname' => ['required', 'string','min:2', 'max:255'],
        'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($this->uniqueUser)],
        'gender' => ['required'],
        'salary' => ['required'],
        'position' => ['required'],
        'dob' => ['required'],
        'address' => ['required'],
        'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:12'],
    ]);
    User::find($this->uniqueUser)->update([
        'name' => $this->fname.' '.$this->mname.' '.$this->lname,
        'fname'=>$this->fname,
        'lname'=>$this->lname,
        'mname'=>$this->mname,
        'email' =>$this->email,
        'phone' =>$this->phone,
        'gender' =>$this->gender,
    ]);
    StaffRecord::where('user_id',$this->uniqueUser)->update([
        'dob'=>$this->dob,
        'current_position'=>$this->position,
        'current_salary'=>$this->salary,
        'home_address'=>$this->address,
    ]);
    Session::flash('status','Data updated successfully');

    $this->reset();
}



    public function render()
    {
//        $this->client = User::where('onlineUser',0)->latest()->get();
        return view('livewire.staff',[
            'paginator'=>User::with('staff')
                ->where('role','worker')
                ->orWhere('role','cashier')
                ->orWhere('role','manager')
                ->orWhere('role','reception')
                ->latest()->paginate($this->pagine)]);
    }

}
