<?php

namespace App\Http\Livewire;

use App\Models\Title;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class WireTitle extends Component
{
    public $selectedItemId;
    use LivewireAlert;

    protected $listeners = [
        'confirmed',
        'cancelled',
        'delete',
        'refreshParent' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.wire-title', [
            'data' => $this->resultData()
        ]);
    }

    public function resultData()
    {
        return Title::all();
    }

    public function selectedItem($item, $action)
    {
        $this->selectedItemId = $item;

        if ($action == 'delete') {
            $this->triggerConfirm();
        } else {
            $this->emit('getModelId', $this->selectedItemId);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function create()
    {
        $this->emit('cleanVars');
        $this->dispatchBrowserEvent('openModal');
    }
    public function delete($id)
    {


        Title::destroy($id);

        $this->isSuccess('Berhasil Menghapus Data');
    }

    public function denied()
    {
        // Do something when denied button is clicked
        $this->alert('info', 'denied');
    }

    public function triggerConfirm()
    {
        $this->confirm('Do you wish to continue ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'showCancelButton' =>  true,
            'onConfirmed' => 'delete',
            'onCancelled' => 'cancelled'
        ]);
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
    public function confirmed()
    {
        // Example code inside confirmed callback

        $this->alert('success', 'Hello World!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  true,
        ]);
    }

    public function cancelled()
    {
        // Example code inside cancelled callback

        $this->alert('info', 'Understood');
    }
}
