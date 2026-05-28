<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Advanced statistics') }}
           
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                       <form method="post" action="{{ route('advanced.statistics.adupdate',[$statistics,$adstat]) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
        <div>
            <x-input-label for="file_name" :value="__('Insert file name')" />
                       
            <x-text-input id="file_name" name="file_name" type="text" class="mt-1 block w-full" :value="old('file_name',$adstat->file_name)" autocomplete="off"  />
          
            <x-input-error :messages="$errors->get('file_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="file_url" :value="__('Insert file url')" />
          
            <x-text-input id="file_url" name="file_url" type="text" class="mt-1 block w-full" :value="old('file_url',$adstat->file_url)" autocomplete="off" />
          
            <x-input-error :messages="$errors->get('file_url')" class="mt-2" />
        </div>


         <input type="hidden" name="statistic_id" value="{{ $statistics->id }}">

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
                </div>
               

  


            </div>
            
        </div> 
        
    </div>



    





</x-app-layout>