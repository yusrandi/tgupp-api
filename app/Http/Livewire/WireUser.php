<?php

namespace App\Http\Livewire;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class WireUser extends Component
{
    use LivewireAlert;

    public $selectedItemId;

    protected $listeners = [
        'confirmed',
        'cancelled',
        'delete',
        'refreshParent' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.wire-user', [
            'data' => $this->resultData()
        ]);
    }

    public function resultData()
    {
        return User::with(['role', 'employment'])->get();
    }

    public function edit($id)
    {
        $this->selectedItemId = $id;
        return redirect()->to('/user/' . $id . '/edit');
    }

    public function delete($id)
    {
        $delete = User::destroy($id);
        $this->selectedItemId = null;
        $delete ? $this->isSuccess("Berhasil Menghapus Data") : $this->isError("Gagal Menghapus Data");
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
