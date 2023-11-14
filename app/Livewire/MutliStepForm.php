<?php

namespace App\Livewire;

use Livewire\Component;

class MutliStepForm extends Component
{
    public $step = 1;
    public $lastStep = 3;
    public $email, $password, $password_confirmation, $linkedin, $twitter, $facebook, $fullname, $mobile, $address;


    private function emptyInput()
    {
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->linkedin = '';
        $this->twitter = '';
        $this->facebook = '';
        $this->fullname = '';
        $this->mobile = '';
        $this->address = '';
    }
    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
        } elseif ($this->step == 2) {
            $this->validate([
                'linkedin' => 'required|url|max:255',
                'twitter' => 'required|url|max:255',
                'facebook' => 'required|url|max:255',
            ]);
        } elseif ($this->step == 3) {
            $this->validate([
                'fullname' => 'required|string|max:255',
                'mobile' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]);
        }

        // Move to the next step if validation passes
        if ($this->step != $this->lastStep) {
            $this->step++;
        }
    }

    public function prevStep()
    {
        if ($this->step != 1) {
            $this->step--;
        }
    }

    public function save()
    {
        $this->emptyInput();
        dd('Data save successfully');
    }

    public function render()
    {
        return view('livewire.mutli-step-form');
    }
}
