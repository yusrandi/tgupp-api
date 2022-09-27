<?php

namespace App\Http\Livewire;

use App\Models\Employment;
use App\Models\Role;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;


class WireUserForm extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $image, $fullname, $employment_id, $role_id, $email, $password, $user;
    public $selectedItemId;

    public function mount($user = null)
    {
        if ($user) {
            $this->user = $user;
            $this->selectedItemId = $user->id;
            $this->fullname = $user->fullname;
            $this->employment_id = $user->employment_id;
            $this->role_id = $user->role_id;
            $this->email = $user->email;
        }
    }
    public function render()
    {
        return view('livewire.wire-user-form', [
            'employments' => Employment::orderby('name')->get(),
            'roles' => Role::orderby('name')->get()
        ]);
    }

    public function save()
    {
        $this->selectedItemId ? $this->update() : $this->create();
    }
    public function create()
    {
        $validateData = [];
        $validateData = array_merge($validateData, [
            'email' => 'required|max:255|unique:users',
            'fullname' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required',
            'employment_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $this->validate($validateData);

        $this->image->store('public/photos');

        $data['image'] = $this->image->hashName();
        $data['password'] = Hash::make($this->password);

        User::create($data);
        $this->isSuccess("Berhasil Menambahkan Data");
        $this->cleanVars();
    }
    public function update()
    {
        $validateData = [];
        $validateData = array_merge($validateData, [
            'email' => 'required|max:255|unique:users,email,' . $this->user->id,
            'fullname' => 'required|max:255',
            'role_id' => 'required',
            'employment_id' => 'required',
        ]);

        $data = $this->validate($validateData);

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }
        if ($this->image) {
            $this->image->store('public/photos');
            $data['image'] = $this->image->hashName();
        }

        $update = User::find($this->selectedItemId)->update($data);

        $update ? $this->isSuccess("Data Berhasil Terubah") : $this->isError("Data Gagal Terubah");
        $this->cleanVars();
        return redirect()->to('/user/');
    }

    public function cleanVars()
    {
        $this->selectedItemId = null;
        $this->fullname = null;
        $this->email = null;
        $this->password = null;
        $this->employment_id = null;
        $this->role_id = null;
        $this->image = null;
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
