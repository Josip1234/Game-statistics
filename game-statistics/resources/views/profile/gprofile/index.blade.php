<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game profile homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('layouts.navigation2')
                    @if (session('status'))
                        <div class="mb-4 rounder-md bg-green-50 p-4 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full border">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border px-3 py-2 text-left">ID</th>
                                    <th class="border px-3 py-2 text-left">Profile name</th>
                                    <th class="border px-3 py-2 text-left">Game</th>
                                    <th class="border px-3 py-2 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $profile)
                        <tr>
                            <td class="border px-3 py-2">{{ $profile->id }}</td> 
                            <td class="border px-3 py-2">{{ $profile->profile_name }}</td> 
                            <td class="border px-3 py-2">{{ $profile->game->name }}</td> 
                            <td class="border px-3 py-2"><a href="{{ route('game.profile.edit',[$game,$profile]) }}"><i class="bi bi-pencil-square"></i></a></td>
                        </tr>
                          @endforeach
                            </tbody>
                        </table>
                        <div class="mt-6 flex justify-center">
                              {{ $profiles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
