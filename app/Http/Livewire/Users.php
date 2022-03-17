<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;


class Users extends Component
{



    use WithPagination;

    public $pagine = 10;
    public $client = "";
    public $fname, $mname, $lname, $email, $gender, $phone, $fullName, $idx, $uniqueUser, $updateData,$role;

    //show models
    public $createModel = false;
    public $updateModel = false;

    public function showCreateModel()
    {
        $this->createModel = true;
    }

    public function clear()
    {
        $this->role='';
        $this->fname = '';
        $this->mname = '';
        $this->lname = '';
        $this->email = '';
        $this->gender = '';
        $this->phone = '';
    }

    public function cancel()
    {
        $this->reset();
    }

    public function showUpdate($unique)
    {
        $this->updateModel = true;
        $this->uniqueUser = $unique;
        $this->updateData = User::find($unique);
        $this->fname = $this->updateData->fname;
        $this->mname = $this->updateData->mname;
        $this->lname = $this->updateData->lname;
        $this->email = $this->updateData->email;
        $this->gender = $this->updateData->gender;
        $this->phone = $this->updateData->phone;
        $this->role=$this->updateData->role;


    }

    public function save()
    {
        $this->validate([
            'fname' => ['required', 'string', 'min:2', 'max:255'],
            'lname' => ['required', 'string', 'min:2', 'max:255'],
            'mname' => ['required', 'string', 'min:2', 'max:255'],
            'gender' => ['required'],
            'email' => ['sometimes','required','string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
        ]);
        //adding to users table
        $user = User::create([
            'onlineUser' => 1,
            'role' => 'user1',
            'name' => $this->fname . ' ' . $this->mname . ' ' . $this->lname,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'mname' => $this->mname,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'role'=>$this->role,
            'password' => Hash::make('12345678'),
        ]);
        $this->reset();
    }

    public function delete($good)
    {
        User::find($good)->delete();
    }


    public function update()
    {
        $this->validate([
            'fname' => ['required', 'string', 'min:2', 'max:255'],
            'lname' => ['required', 'string', 'min:2', 'max:255'],
            'mname' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required','sometimes', 'email', 'max:255', Rule::unique('users')->ignore($this->uniqueUser)],
            'gender' => ['required'],
            'role' => ['required'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
        ]);
        User::find($this->uniqueUser)->update([
            'name' => $this->fname . ' ' . $this->mname . ' ' . $this->lname,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'mname' => $this->mname,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'role'=>$this->role,
        ]);
        Session::flash('status', 'Data updated successfully');

        $this->reset();
    }





    public function render()
    {
        return view('livewire.users',[
            'paginator'=>User::where('role','admin')
                ->orWhere('role','cashier')
                ->orWhere('role','manager')
                ->orWhere('role','reception')
                ->orWhere('role','worker')
                ->latest()->paginate($this->pagine)]);
    }
}
