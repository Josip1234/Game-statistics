<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Modification Detail') }}
            {{ $modification->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="{{ route('modification.details.store',$modification) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
        <div>
            <x-input-label for="description" :value="__('Insert new mod detail description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')" autocomplete="off" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

          <div>
            <label for="file_url">Modification file</label>
            @if(session('original_file_name') && session('original_file_name')!="")
                <p>{{ session('original_file_name') }}</p>
                <input type="file" name="file_url" value="{{ session('original_file_name') }}" class="mt-1 block w-full" id="file_url">
            @else 
               <input type="file" name="file_url" value="{{ old('file_url') }}" class="mt-1 block w-full" id="file_url">
            @endif         
            @error('file_url')
                <p class="mt-2">{{ $message }}</p>
            @enderror
        </div>

      
        <input type="hidden" name="mod_id" value="{{ $modification->id }}">
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>



    





</x-app-layout>