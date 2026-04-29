<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              @if(request()->routeIs('game.statistics.gamStNew'))
              {{ __('New game statistics') }}
              @else
                {{ __('New sequel statistics') }}
                @endif 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                      @if(request()->routeIs('game.statistics.gamStNew'))
                         <form method="post" action="{{ route('game.statistics.gamSave',$game) }}" class="mt-6 space-y-6">
                      @else 
                       <form method="post" action="{{ route('sequel.statistics.seqSave',$sequel) }}" class="mt-6 space-y-6">
                      @endif
                    @csrf
        <div>
            <x-input-label for="game_progress" :value="__('Insert game progress')" />
            <x-text-input id="game_progress" name="game_progress" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('game_progress')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hours_played" :value="__('Insert playing hours')" />
            <x-text-input id="hours_played" name="hours_played" type="number" class="mt-1 block w-full" autocomplete="off"  min='0' />
            <x-input-error :messages="$errors->get('hours_played')" class="mt-2" />
        </div>

             <div>
            <x-input-label for="started_playing" :value="__('Insert date of playtime start')" />
            <input type="date" name="started_playing" id="started_playing" class="mt-1 block w-full">
      
            <x-input-error :messages="$errors->get('started_playing')" class="mt-2" />
        </div>

        <div>
            <label for="ended_playing" class="block font-medium text-sm text-gray-700">Insert date of playtime end</label>
            <input type="date" name="ended_playing" id="ended_playing" class="mt-1 block w-full">
          
            @error('ended_playing')
                <p class="mt-2">{{ $message }}</p>
            @enderror
        </div>
           @if(request()->routeIs('game.statistics.gamStNew'))
            <input type="hidden" name="game_id" value="{{ $game->id }}">
           @else
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

