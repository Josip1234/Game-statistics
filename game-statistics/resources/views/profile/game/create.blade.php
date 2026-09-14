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
                            <x-text-input id="name" name="name" type="text" :value="old('name')"
                                class="mt-1 block w-full" autocomplete="off" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="yearOrRangeOfProduction" :value="__('Insert year or range of years')" />
                            <x-text-input id="yearOrRangeOfProduction" name="yearOrRangeOfProduction" type="text"
                                :value="old('yearOrRangeOfProduction')" class="mt-1 block w-full" autocomplete="off" />
                            <x-input-error :messages="$errors->get('yearOrRangeOfProduction')" class="mt-2" />
                        </div>

                        <div>
                            <label for="have_sequel" class="block font-medium text-sm text-gray-700">Choose mark of
                                sequel</label>
                            <select name="have_sequel" id="have_sequel" class="mt-1 block w-full">
                                <option value="0" @selected(old('have_sequel') == 0)>No sequel</option>
                                <option value="1" @selected(old('have_sequel') == 1)>Has sequel</option>
                            </select>
                            @error('have_sequel')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="genre" class="block font-medium text-sm text-gray-700">Select game
                                genre</label>
                            <select name="genre_id" id="genre" class="mt-1 block w-full">
                                <option value=""> {{ __('-- Select genre --') }}</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>{{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="platform_id" class="block font-medium text-sm text-gray-700">Select game
                                platform</label>
                            <select name="platform_id" id="platform_id" class="mt-1 block w-full">
                                <option value=""> {{ __('-- Select platform --') }}</option>
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}" @selected(old('platform_id') == $platform->id)>
                                        {{ $platform->name }}</option>
                                @endforeach
                            </select>
                            @error('platform_id')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                     <!-- mobile tablet or desktop has the same number of columns -->
                    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-2">
                        <div class="md:mr-[50%] lg:mr-[50%]">

                            <h3 class="mb-4 font-semibold text-heading">{{ __('Additional Genres') }}</h3>
                            <ul class="w-48 md:w-48 lg:w-48 select-none text-sm font-medium text-heading bg-neutral-primary-soft border border-default rounded-base"
                                id="checkboxValues">
                                @foreach ($genres as $genre)
                                    <li class="w-full border-b border-default rounded-t-lg" id="{{ $genre->id }}">
                                        <div class="flex items-center ps-3">
                                            <input id="game_genre[]" type="checkbox" value="{{ $genre->id }}"
                                                name="game_genre[]"
                                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                            <label for="game_genre[]"
                                                class="w-full py-3 ms-2 text-sm font-medium text-heading">{{ $genre->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>




                            @error('game_genre.*')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="md:ml-[50%] lg:ml-[50%]">

                            <h3 class="mb-4 font-semibold text-heading">{{ __('Additional Platforms') }}</h3>
                            <ul class="w-54 md:w-40 lg:w-72 select-none text-sm font-medium text-heading bg-neutral-primary-soft border border-default rounded-base"
                                id="checkboxValues">
                                @foreach ($platforms as $platform)
                                    <li class="w-full border-b border-default rounded-t-lg" id="{{ $platform->id }}">
                                        <div class="flex items-center ps-3">
                                            <input id="game_platform[]" type="checkbox" value="{{ $platform->id }}"
                                                name="game_platform[]"
                                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                            <label for="game_platform[]"
                                                class="w-full py-3 ms-2 text-sm font-medium text-heading">{{ $platform->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>



                            @error('game_platform.*')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror

                        </div>


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
