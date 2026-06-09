<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> 
            @if(request()->routeIs('game.sequel.modifications.seqIndex')) 
            {{ __('Game sequel modification') }}
               {{ __('Sequel name:') }}
            {{ $sequel->name }}
            @else
            {{ __('Game modification') }}
               {{ __('Game name:') }}
            {{ $game->name }}
            @endif
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
                            <th class="border px-3 py-2 text-left">Modification name</th>
                             @if(request()->routeIs('game.sequel.modifications.seqIndex'))
                            <th class="border px-3 py-2 text-left">Game name</th>
                            <th class="border px-3 py-2 text-left">Sequel name</th>
                            @else 
                            <th class="border px-3 py-2 text-left">Game name</th>
                            @endif
                            <th class="border px-3 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                    @foreach ($modifications as $mod)
                        <tr>
                              
                            <td class="border px-3 py-2">{{ ++$id; }}</td>
                            <td class="border px-3 py-2">{{ $mod->name }}</td>
                             @if(request()->routeIs('game.sequel.modifications.seqIndex'))
                             <td class="border px-3 py-2">{{ $game->name }}</td>
                             <td class="border px-3 py-2">{{ $sequel->name }}</td>
                             @else 
                              <td class="border px-3 py-2">{{ $game->name }}</td>
                             @endif  
                             @if(request()->routeIs('game.sequel.modifications.seqIndex'))
                             <td class="border px-3 py-2">
                                 <a href="{{ route('game.sequel.modifications.seqEdit',[$game,$sequel,$mod]) }}"><i class="bi bi-pencil-square"></i>
                                    
                                    <form method="POST"
                                                      action="{{ route('game.sequel.modifications.seqDelete', [$game,$sequel,$mod]) }}"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Confirm sequel modification deletion?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline">
                                                        <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form> 
                                         <a href="{{ route('modification.details.index',$mod) }}"><i class="bi bi-ticket-detailed"></i></a>

                             </td>
                             @else
                              <td class="border px-3 py-2">
                                <a href="{{ route('game.sequel.modifications.edit',[$game,$mod]) }}"><i class="bi bi-pencil-square"></i>
                                    
                                    <form method="POST"
                                                      action="{{ route('game.sequel.modifications.delete', [$game,$mod]) }}"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Confirm game modification deletion?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline">
                                                        <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form> 
                                        <a href="{{ route('modification.details.index',$mod) }}"><i class="bi bi-ticket-detailed"></i></a>
                              </td>
                             @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                    
                        {{ $modifications->links() }}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>