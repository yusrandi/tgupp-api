<?php

namespace App\Http\Livewire;

use App\Models\Employment;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EmploymentForm extends Component
{
    use LivewireAlert;
    public $name, $salary, $selectedItemId;

    protected $rules = [
        'name' => 'required',
        // 'salary' => 'required',

    ];
    protected $messages = [
        'name.required' => 'this field is required',
        // 'salary.required' => 'this field is required',

    ];

    protected $listeners = [
        'cleanVars',
        'getModelId',
        'forceCloseModal',
    ];

    public function render()
    {
        return view('livewire.employment-form');
    }

    public function getModelId($modelId)
    {
        $this->selectedItemId = $modelId;
        $model = Employment::find($this->selectedItemId);
        $this->name = $model->name;
        $this->salary = $model->salary;
    }
    public function save()
    {
        $data = $this->validate();
        $data['salary'] = '1000000';

        $this->selectedItemId ? Employment::find($this->selectedItemId)->update($data)
            : Employment::create($data);


        $this->isSuccess("Berhasil");
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->forceCloseModal();
    }

    public function cleanVars()
    {
        $this->name = null;
        $this->selectedItemId = null;
        $this->salary = null;
    }


    public function forceCloseModal()
    {
        $this->cleanVars();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function isSuccess($msg)
    {
        $this->alert('success', $msg, [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
    public function isError($msg)
    {
        $this->alert('error', $msg, [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
}
