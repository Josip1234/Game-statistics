<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New game sequel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="{{ route('game.sequel.save',$game) }}" class="mt-6 space-y-6">
                    @csrf
        <div>
            <x-input-label for="name" :value="__('Insert new sequel name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="publish_year" :value="__('Insert year of publish')" />
            <x-text-input id="publish_year" name="publish_year" type="number" class="mt-1 block w-full" autocomplete="off" step='1' min='0' />
            <x-input-error :messages="$errors->get('publish_year')" class="mt-2" />
        </div>

             <div>
            <x-input-label for="game_version" :value="__('Insert new game version')" />
            <x-text-input id="game_version" name="game_version" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('game_version')" class="mt-2" />
        </div>

        <div>
            <label for="version_history">Insert versions history</label>
            <textarea name="version_history" id="version_history" cols="30" rows="10" class="mt-1 block w-full"></textarea>
            @error('version_history')
                <p class="mt-2">{{ $message }}</p>
            @enderror
            <x-input-error :messages="$errors->get('version_history')" class="mt-2" />
        </div>

         <input type="hidden" name="game_id" value="{{ $game->id }}">

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>



    





</x-app-layout>