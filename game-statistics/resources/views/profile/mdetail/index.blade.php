<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> 
        
            {{ __('Game modification') }}
            {{ $modification->name }}
         
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
                            <th class="border px-3 py-2 text-left">Modification description</th>
                            <th class="border px-3 py-2 text-left">Modification file url</th> 
                            <th class="border px-3 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                    @foreach ($mdetails as $md)
                        <tr>
                            <td class="border px-3 py-2">{{ $md->id }}</td>
                            <td class="border px-3 py-2">{{ $md->description }}</td>
                            <td class="border px-3 py-2">{{ $md->file_url }}</td>
                            <td class="border px-3 py-2"><a href="{{ route('modification.details.edit',[$modification,$md]) }}"><i class="bi bi-pencil-square"></i></a>
                            
                            
                                      <form method="POST"
                                                      action="{{ route('modification.details.delete', [$modification,$md]) }}"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Confirm detail deletion?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline">
                                                        <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form>
                            
                            
                            
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                    
                        {{ $mdetails->links() }}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>