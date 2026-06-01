<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Json data index') }}
        </h2>
    </x-slot>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                      <div class="w-full max-w-sm p-6 bg-neutral-primary-soft border border-default rounded-base shadow-xs mx-auto">
    <h5 class="mb-4 text-xl font-medium text-body">Json data</h5>
    <ul role="list" class="space-y-4 my-6">
                     @foreach ($addat as $key=>$val)
                       <li class="flex items-center">
                             <span class="text-body">{{ $key }}{{ __(':') }}{{ $val }}</span>
                         </li>
                   
                       
                     @endforeach
                    </ul>



      
    </ul>
</div>


        <div>
  
                </div>
               

  


            </div>
            
        </div> 
        
    </div>

</x-app-layout>