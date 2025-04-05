<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Editable Table') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Edit data Tabel') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <livewire:table-editable />
    </div>
</x-layouts.app>
