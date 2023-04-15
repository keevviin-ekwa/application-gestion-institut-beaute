<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reservation extends Component
{
    public $currentStep = 1;
    public $name;
    // la vue
    public function render()
    {
        return view('livewire.reservation-form');
    }

    /**
    * action apres le premier formulaire
     */
    public function firstStepSubmit()
    {


        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);

        $this->currentStep = 3;
    }

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
