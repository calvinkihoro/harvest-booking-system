<?php

namespace App\Http\Livewire;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Livewire\Component;

class GenerateReports extends Component
{

    public $from,$to,$type;



    public function submit() {

        $startDate = new Carbon( $this->from);
        $endDate = new Carbon( $this->to);
        $logo=url('images/logo.svg');
        if($this->type=='MONEY IN' || $this->type=='MONEY OUT'){
            $users = \App\Models\Accounting::where('type',$this->type)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();

            $pdf = PDF::loadView('pdf.money',array('logo'=>$logo,'type'=>$this->type,'account'=>$users,'tittle'=>$this->type,'from'=>$this->from,'to'=>$this->to))
                ->setPaper('A4','potrait')->output();

$name=$this->type." REPORT ON".Carbon::now().".pdf";
            return response()->streamDownload(
              fn()=>print($pdf),
                $name

            );


        }else{
            dd('error Occured.....');
        }



    }


    public function render()
    {
        return view('livewire.generate-reports');
    }
}
