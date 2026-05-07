<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Sequel Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="{{ route('sequel.profile.update',[$game,$sequel,$profile]) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
        <div>
            <x-input-label for="profile_name" :value="__('Update profile name')" />
            <x-text-input id="profile_name" name="profile_name" type="text" class="mt-1 block w-full" autocomplete="off" :value="old('profile_name',$profile->profile_name)" />
            <x-input-error :messages="$errors->get('profile_name')" class="mt-2" />
        </div>

         <input type="hidden" name="sequel_id" value="{{ $sequel->id }}">
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