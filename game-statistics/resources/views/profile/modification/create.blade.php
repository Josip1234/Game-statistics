<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              @if(request()->routeIs('game.sequel.modifications.create'))
              {{ __('New game modification') }}
              @else
                {{ __('New sequel modification') }}
                @endif 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2') 
                          @if(request()->routeIs('game.sequel.modifications.create'))
                          <form method="post" action="{{ route('game.sequel.modifications.store',$game) }}" class="mt-6 space-y-6">
                        @else
                           <form method="post" action="{{ route('game.sequel.modifications.seqStore',[$game,$sequel]) }}" class="mt-6 space-y-6">
                         @endif 
                         @csrf
                          <div>
            <x-input-label for="name" :value="__('Insert new game modification')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

            @if(request()->routeIs('game.sequel.modifications.create'))
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
              @else
                   <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="hidden" name="sequel_id" value="{{ $sequel->id }}">
                @endif 
      
                
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
                    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>
</x-app-layout>

