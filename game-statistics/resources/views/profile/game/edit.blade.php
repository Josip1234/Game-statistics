<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('layouts.navigation2')
                    <form method="post" action="{{ route('profile.game.update', $game) }}" class="mt-6 space-y-6" >
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="name" :value="__('Update game name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $game->name)" autocomplete="off" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="yearOrRangeOfProduction" :value="__('Update year or range of years')" />
                            <x-text-input id="yearOrRangeOfProduction" name="yearOrRangeOfProduction" type="text"
                                class="mt-1 block w-full" :value="old('yearOrRangeOfProduction', $game->yearOrRangeOfProduction)" autocomplete="off" />
                            <x-input-error :messages="$errors->get('yearOrRangeOfProduction')" class="mt-2" />
                        </div>

                        <div>
                            <label for="have_sequel" class="block font-medium text-sm text-gray-700">Choose mark of
                                sequel</label>
                            <select name="have_sequel" id="have_sequel" class="mt-1 block w-full">
                                <option value="0" @selected(old('have_sequel', $game->have_sequel) == 0)>No sequel</option>
                                <option value="1" @selected(old('have_sequel', $game->have_sequel) == 1)>Has sequel</option>
                            </select>
                            @error('have_sequel')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="genre" class="block font-medium text-sm text-gray-700">Select game
                                genre</label>
                            <select name="genre_id" id="genre" class="mt-1 block w-full">
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" @selected(old('genre_id', $game->genre_id) == $genre->id)>{{ $genre->name }}
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
                            <select name="platform_id" id="platform_id" class="mt-1 block w-full" onchange="selectLast(this.form.optList1);">
                                @foreach ($platform as $platform)
                                    <option value="{{ $platform->id }}" @selected(old('platform_id', $game->platform_id) == $platform->id)>
                                        {{ $platform->name }}</option>
                                @endforeach
                            </select>
                            @error('platform_id')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>

                            <h3 class="mb-4 font-semibold text-heading">{{ __('Additional Genres') }}</h3>
                            <ul
                                class="w-48 select-none text-sm font-medium text-heading bg-neutral-primary-soft border border-default rounded-base" id="checkboxValues">
                                           @foreach ($genres as $genre)
   
                                <li class="w-full border-b border-default rounded-t-lg" id="{{ $genre->id }}">
                                    <div class="flex items-center ps-3">
                                        <input id="game_genre[]" type="checkbox" value="{{ $genre->id }}" name="game_genre[]"
                                            class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                            @checked(old('genre_id', $game->genre_id) == $genre->id)>
                                        <label for="game_genre[]"
                                            class="w-full py-3 ms-2 text-sm font-medium text-heading">{{ $genre->name }}</label>
                                    </div>
                                </li>
                                   @endforeach
                            </ul>

   


                            @error('game_genre')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>

                        </div>
                    </form>
                </div>





            </div>

        </div>

    </div>
</x-app-layout>
