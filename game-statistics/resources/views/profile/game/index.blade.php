<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gaming homepage') }}
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
                            <th class="border px-3 py-2 text-left">Game name</th>
                            <th class="border px-3 py-2 text-left">Year of production</th>
                            <th class="border px-3 py-2 text-left">User</th>
                            <th class="border px-3 py-2 text-left">Sequel?</th>
                            <th class="border px-3 py-2 text-left">Genre</th>
                            <th class="border px-3 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                        <tr>
                            <td class="border px-3 py-2">{{ $game->id }}</td>
                            <td class="border px-3 py-2">{{ $game->gn }}</td>
                            <td class="border px-3 py-2">{{ $game->yearOrRangeOfProduction }}</td>
                            <td class="border px-3 py-2">{{ $game->nickname}}</td>   
                            <td class="border px-3 py-2">{{ ($game->have_sequel===1)?"Have sequel":"No sequel"; }}</td>  
                            <td class="border px-3 py-2">{{ ($game->name===null)?"Genre not defined":$game->name}}</td>       
                            <td class="border px-3 py-2"><a href="{{ route('profile.game.edit',$game) }}"><i class="bi bi-pencil-square"></i></a>
                            
                                    <form method="POST"
                                                      action="{{ route('profile.game.delete', $game) }}"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Confirm game deletion');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline">
                                                        <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form>
                                                @if($game->have_sequel===1)
                                                   <a href="{{ route('game.sequel.homepage',$game) }}"><i class="bi bi-arrow-bar-right"></i></a>
                                                @else 
                                                   <a href="{{ route('game.statistics.gamStIndex',$game) }}"><i class="bi bi-arrow-bar-right"></i><i class="bi bi-controller"></i><i class="bi bi-123"></i></a>
                                                @endif
                              
                            
                            </td>                  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                        {{ $games->links() }}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>