<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data to map (file name):') }}
            {{ $advancedStatToMap->file_name }}
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="" class="mt-6 space-y-6">
                    @csrf

                       <div class="mb-4">
                             <x-input-label for="profile_id" :value="__('Select save game file')" />
                             <select name="profile_id" id="profile_id" class="mt-1 block w-full">
                                @foreach($listOfProfiles as $save_games)
                                       <option value="{{ $save_games->id }}" @selected(old('profile_id')==$save_games->id)>{{ $save_games->profile_name }}</option>
                                @endforeach

                             </select>
                             <x-input-error :messages="$errors->get('profile_id')" class="mt-2"/>
                        </div>


           <div>
            <x-input-label for="save_game_file" :value="__('Upload save game file')" />

            <x-text-input id="save_game_file" name="save_game_file" type="text" class="mt-1 block w-full" :value="old('save_game_file')" autocomplete="off" />

            <x-input-error :messages="$errors->get('save_game_file')" class="mt-2" />
        </div>

              <input type="hidden" name="ad_stat_id" value="{{ $advancedStatToMap->id }}">

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>





            </div>

        </div>

    </div>

</x-app-layout>
