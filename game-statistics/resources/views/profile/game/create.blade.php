<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="{{ route('profile.game.add') }}" class="mt-6 space-y-6">
                    @csrf
        <div>
            <x-input-label for="name" :value="__('Insert new game name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="yearOrRangeOfProduction" :value="__('Insert year or range of years')" />
            <x-text-input id="yearOrRangeOfProduction" name="yearOrRangeOfProduction" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('yearOrRangeOfProduction')" class="mt-2" />
        </div>

        <div>
            <label for="have_sequel" class="block font-medium text-sm text-gray-700">Choose mark of sequel</label>
            <select name="have_sequel" id="have_sequel" class="mt-1 block w-full">
                <option value="0">No sequel</option>
                <option value="1">Has sequel</option>
            </select>
            @error('have_sequel')
                <p class="mt-2">{{ $message }}</p>
            @enderror
        </div>  


           <div>
            <label for="genre" class="block font-medium text-sm text-gray-700">Select game genre</label>
            <select name="genre_id" id="genre" class="mt-1 block w-full">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            @error('genre_id')
                <p class="mt-2">{{ $message }}</p>
            @enderror
        </div>



         <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>



    





</x-app-layout>