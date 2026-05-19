<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Json Key Values') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="" class="mt-6 space-y-6">
                    @csrf
        <div>
            <x-input-label for="key" :value="__('Insert new attribute key')" />
            <x-text-input id="key" name="key" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('key')" class="mt-2" />
        </div>

         <div>
            <x-input-label for="val" :value="__('Insert new attribute value')" />
            <x-text-input id="val" name="val" type="text" class="mt-1 block w-full" autocomplete="off" />
            <x-input-error :messages="$errors->get('val')" class="mt-2" />
        </div>
           
         <div class="flex items-center gap-4">
            
            <button type="button" id="newvals" class="
            inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add new key val text field</button>

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>



    





</x-app-layout>