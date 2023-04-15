<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $price, $detail, $status = 1;
    public $user ;

    public $successMsg = '';

    /**
     * Write code on Method
     */
    public function render()
    {
        $this->user=User::all();
        return view('livewire.wizard');
    }

    public function search(){
        $this->user= User::where('nom',$this->name)->get();


    }

    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {


        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     */
    public function submitForm()
    {
        Team::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
            'status' => $this->status,
        ]);

        $this->successMsg = 'Team successfully created.';

        $this->clearForm();

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->name = '';
        $this->price = '';
        $this->detail = '';
        $this->status = 1;
    }


}
