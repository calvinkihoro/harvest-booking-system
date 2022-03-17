<?php

namespace App\Http\Livewire;
use App\Models\Accounting as Accounts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Accounting extends Component
{
    use WithPagination;

    public $pagine=10;
    public $payment,$type,$description,$amount;
    public $createModel=false;



    public function showCreateModel(){
        $this->createModel=true;

    }

    public function addData(){
        $this->validate([
            'payment' => ['required'],
            'amount' => ['required'],
            'type' => ['required', 'string'],
            'description' => ['required', 'string','min:20', 'max:255'],
        ]);
        Accounts::create([
            'type'=>$this->type,
            'payment'=>$this->payment,
            'description'=>$this->description,
            'amount'=>$this->amount,
            'verification'=>'verified',
            'authorizeBy'=>Auth::user()->name,
        ]);
        $this->reset();

    }



    public function clear(){
        $this->payment='';
        $this->type='';
        $this->description='';
        $this->amount ='';
    }

    public function cancel(){
        $this->reset();
    }

    public function render()
    {
        return view('livewire.accounting',['paginator'=>Accounts::latest()->paginate($this->pagine)]);
    }
}
