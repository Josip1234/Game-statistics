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
                        @if(request()->routeIs('advanced.statistics.sjson_data'))
                       <form method="post" action="{{ route('advanced.statistics.seq_json',[$sequel,$statistics]) }}" class="mt-6 space-y-6">
                        @else 
                        <form method="post" action="{{ route('advanced.statistics.gam_json',[$game,$statistics]) }}" class="mt-6 space-y-6">
                        @endif
                    @csrf 
        <div id="values">
          
        </div>
              
         <div class="flex items-center gap-4">
            
            <button type="button" id="newvals" class="
            inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            onclick="addNewTextFields()">Add new key val text field</button>
            
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