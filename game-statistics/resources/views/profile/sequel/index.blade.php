<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game sequel homepage') }}
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
                            <th class="border px-3 py-2 text-left">Game series</th>
                            <th class="border px-3 py-2 text-left">Game name</th>
                            <th class="border px-3 py-2 text-left">Published year</th>
                            <th class="border px-3 py-2 text-left">Game version</th>
                            <th class="border px-3 py-2 text-left">Version history</th>
                            <th class="border px-3 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sequels as $sequel)
                        <tr>
                            <td class="border px-3 py-2">{{ $sequel->id }}</td>
                            <td class="border px-3 py-2">{{ $game->name }}</td>
                               <td class="border px-3 py-2">{{ $sequel->name}}</td>
                                <td class="border px-3 py-2">{{ $sequel->publish_year }}</td> 
                            <td class="border px-3 py-2">{{ $sequel->game_version}}</td>
                              <td class="border px-3 py-2">{{ $sequel->version_history}}</td>   
                                          
                            <td class="border px-3 py-2">
                            
                            </td>                  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                        {{ $sequels->links() }}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>