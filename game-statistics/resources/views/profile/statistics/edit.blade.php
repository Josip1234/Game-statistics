<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit sequel statistics:') }} {{ $sequel->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                     <form action="{{ route('sequel.statistics.seqStore',[$sequel,$statistics]) }}" method="post" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <label for="game_progress" class="block font-medium text-sm text-gray-700">Edit game progress</label>
                        <input type="text" name="game_progress" id="game_progress" class="mt-1 block w-full" value="{{ old('game_progress',$statistics->game_progress) }}">
                        @error('game_progress')
                            <p class="mt-2">{{ $message }}</p>
                        @enderror
                        <label for="hours_played" class="block font-medium text-sm text-gray-700">Edit hours played</label>
                        <input type="number" min="0" name="hours_played" id="hours_played" class="mt-1 block w-full" value="{{ old('hours_played',$statistics->hours_played) }}">
                        @error('hours_played')
                            <p class="mt-2">{{ $message }}</p>
                        @enderror
                        <label for="started_playing" class="block font-medium text-sm text-gray-700">Edit gameplay start</label>
                        <input type="date" name="started_playing" id="started_playing" class="mt-1 block w-full" value="{{ old('started_playing',$statistics->started_playing?->format("Y-m-d")) }}">
                        @error('started_playing')
                            <p class="mt-2">{{ $message }}</p>
                        @enderror
                        <label for="ended_playing" class="block font-medium text-sm text-gray-700">Edit gameplay end</label>
                        <input type="date" name="ended_playing" id="ended_playing" class="mt-1 block w-full" value="{{ old('ended_playing',$statistics->ended_playing?->format("Y-m-d")) }}">
                        @error('ended_playing')
                            <p class="mt-2">{{ $message }}</p>
                        @enderror 
                           <input type="hidden" name="sequel_id" value="{{ $sequel->id }}">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                     </form>

    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>
</x-app-layout>


    
