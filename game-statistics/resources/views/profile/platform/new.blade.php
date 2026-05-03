<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New platform') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="{{ route('game.platform.store') }}" class="mt-6 space-y-6">
                    @csrf
        <div>
            <x-input-label for="name" :value="__('Insert new platform name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="off" :value="old('name')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="platform_history">Insert platform history</label>
            <textarea name="platform_history" id="platform_history" cols="30" rows="10" class="mt-1 block w-full">
                {{ :value="old('platform_history')" }}
            </textarea>
            @error('platform_history')
                <p class="mt-2">{{ $message }}</p>
            @enderror
            <x-input-error :messages="$errors->get('platform_history')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>
</x-app-layout>