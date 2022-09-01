<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Team;

class Wizard extends Component
{
    public $currentStep = 1;
    public $name,$phone, $age, $email, $gender = 1;
    public $successMsg = '';

    /**
     * Write code on Method
     */
    public function render()
    {
        return view('livewire.wizard');
    }

    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'gender' => 'required',
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
            'age' => $this->age,
            'phone' => $this->phone,
            'email' => $this->email,
            'gender' => $this->gender,
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
        $this->phone = '';
        $this->age = '';
        $this->gender = 1;
        $this->email = '';
    }
}
