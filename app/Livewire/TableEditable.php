<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TableEditable extends Component
{
    public $users;
    // Edit data tabel
    public $editing = []; // Menyimpan ID kolom yang sedang diedit
    public $isEditMode = false; // Status mode edit
    // Tambah data tabel
    public $isAddMode = false;
    public $newUser = [
        'name' => '',
        'email' => '',
        'password' => '',
    ];

    public function mount()
    {
        $this->users = User::all();
    }

    // Fungsi untuk mengedit data
    public function toggleEditMode()
    {
        $this->isEditMode = !$this->isEditMode;
        $this->editing = []; // Reset edit jika mode dinonaktifkan
    }

    public function edit($userId, $field)
    {
        if (!$this->isEditMode) return; // Cegah edit jika mode edit tidak aktif

        $this->editing = [$userId => $field];
    }

    public function update($userId, $field, $value)
    {
        if (!$this->isEditMode) return; // Cegah update jika mode edit tidak aktif

        $user = User::findOrFail($userId);
        $user->$field = $value;
        $user->save();

        $this->editing = []; // Keluar dari mode edit setelah update
        $this->users = User::all(); // Refresh data
    }

    // Fungsi untuk menambah data
    public function toggleAddMode()
    {
        $this->isAddMode = !$this->isAddMode;
        $this->resetNewUser(); // bersihkan form jika dibatalkan
    }

    public function resetNewUser()
    {
        $this->newUser = [
            'name' => '',
            'email' => '',
            'password' => '',
        ];
    }

    public function saveNewUser()
    {
        $this->validate([
            'newUser.name' => 'required|string|max:255',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.password' => 'required|string|min:8',
        ],
        [
            'newUser.name.required' => 'Nama harus diisi bro',
            'newUser.email.required' => 'Email harus diisi bro',
            'newUser.password.required' => 'Password harus diisi bro',
            'newUser.email.unique' => 'Email sudah terdaftar bro',
            'newUser.password.min' => 'Password minimal 8 karakter bro',
            'newUser.email.email' => 'Format email tidak valid bro',
        ],
        [
            'newUser.name' => 'Nama',
            'newUser.email' => 'Email',
            'newUser.password' => 'Password',
        ]
    );

        User::create($this->newUser);

        $this->isAddMode = false;
        $this->resetNewUser();
        $this->users = User::all(); // refresh tabel
    }

    public function render()
    {
        return view('livewire.table-editable');
    }
}
