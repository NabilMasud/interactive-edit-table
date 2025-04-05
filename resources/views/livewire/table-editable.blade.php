<div>
    <div class="flex gap-2 mb-4">
        <flux:button variant="{{ $isEditMode ? 'danger' : 'primary' }}" wire:click="toggleEditMode">
            {{ $isEditMode ? 'Nonaktifkan Edit Mode' : 'Aktifkan Edit Mode' }}
        </flux:button>
        <flux:button variant="{{ $isAddMode ? 'danger' : 'primary' }}" wire:click="toggleAddMode">
            {{ $isAddMode ? 'Batal Tambah' : 'Tambah Data' }}
        </flux:button>
    </div>
    <table class="w-full border-collapse border border-gray-900 mt-4">
        <thead>
            <tr class="bg-gray-800">
                <th class="border border-gray-900 p-2">Nama</th>
                <th class="border border-gray-900 p-2">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border border-gray-900 p-2"
                        @if ($isEditMode) wire:click="edit({{ $user->id }}, 'name')" @endif>
                        @if (isset($editing[$user->id]) && $editing[$user->id] === 'name')
                            <input type="text" value="{{ $user->name }}"
                                wire:blur="update({{ $user->id }}, 'name', $event.target.value)"
                                class="w-full focus:outline-none" autofocus>
                        @else
                            {{ $user->name }}
                        @endif
                    </td>
                    <td class="border border-gray-900 p-2"
                        @if ($isEditMode) wire:click="edit({{ $user->id }}, 'email')" @endif>
                        @if (isset($editing[$user->id]) && $editing[$user->id] === 'email')
                            <input type="email" value="{{ $user->email }}"
                                wire:blur="update({{ $user->id }}, 'email', $event.target.value)"
                                class="w-full p-1 border rounded focus:outline-none" autofocus>
                        @else
                            {{ $user->email }}
                        @endif
                    </td>
                </tr>
            @endforeach

            {{-- Baris Tambah Data --}}
            @if ($isAddMode)
                <tr>
                    <td class="border border-gray-900 p-2">
                        <input type="text" wire:model="newUser.name" class="w-full border px-2 py-1"
                            placeholder="Nama baru" autofocus>
                        @error('newUser.name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </td>
                    <td class="border border-gray-900 p-2">
                        <input type="email" wire:model="newUser.email" class="w-full border px-2 py-1"
                            placeholder="Email baru">
                        @error('newUser.email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr :class="{{ $errors ? 'bg-red-500' : 'bg-gray-500' }}">
                    <td class="border border-gray-900 p-2">
                        <input type="password" wire:model="newUser.password" class="w-full border px-2 py-1"
                            placeholder="Password baru">
                        @error('newUser.password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                    </td>
                    <td class="border border-gray-900 p-2 text-center">
                        <flux:button wire:click="saveNewUser">Simpan</flux:button>
                    </td>

                </tr>
            @endif
        </tbody>
    </table>
</div>
