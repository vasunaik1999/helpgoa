<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for warrior') }}
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="d-flex justify-content-center py-20">
        You're logged in as Warrior!
        </div>
    </x-slot>
</x-app-layout>