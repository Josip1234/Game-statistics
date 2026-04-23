<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sequel statistics homepage') }}
               {{ __('Game name:') }}
            {{ $sequel->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                     @if(session("status"))
                     <div class="mb-4 rounder-md bg-green-50 p-4 text-sm text-green-700">
                            {{ session('status') }}
                     </div>
                     @endif
                      <div class="overflow-x-auto">
                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border px-3 py-2 text-left">ID</th>
                            <th class="border px-3 py-2 text-left">Game progress</th>
                            <th class="border px-3 py-2 text-left">Hours Played</th>
                            <th class="border px-3 py-2 text-left">Started Playing</th>
                            <th class="border px-3 py-2 text-left">Ended Playing</th>
                            <th class="border px-3 py-2 text-left">Sequel name</th>
                            <th class="border px-3 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                    @foreach ($statistics as $stat)
                        <tr>
                              
                            <td class="border px-3 py-2">{{ $stat->id }}</td>
                            <td class="border px-3 py-2">{{ $stat->game_progress }}</td>
                            <td class="border px-3 py-2">{{ $stat->hours_played }}</td>
                            <td class="border px-3 py-2">{{ $stat->started_playing }}</td>
                            <td class="border px-3 py-2">{{ $stat->ended_playing }}</td>
                            <td class="border px-3 py-2">{{ $stat->sequels["name"]; }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                        {{ $statistics->links() }}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>