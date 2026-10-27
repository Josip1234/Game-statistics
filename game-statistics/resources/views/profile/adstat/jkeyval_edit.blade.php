<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Json Key Values:') }}
            {{ $data_url }}
        </h2>




         <h3>{{ __('Number of fields in form:') }}</h3>
         @php
             $number_of_fields=0;
         @endphp
         <p id="number_of_fields">
            @if($number_of_fields == 0)
                {{ count($data)*2 }}
            @endif
         </p>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @include('layouts.navigation2')
                        @if(request()->routeIs('advanced.statistics.editJData'))
                       <form method="post" action="" class="mt-6 space-y-6">
                        @endif
                    @csrf
        <div id="values">
            @php
                $index=1;
                $indexKey="key";

                $index2=1;
                $indexValue="val";

                $button="button";
                //label key
                $label1="label";
                //label 2 value
                $label2="label2";

            @endphp
             @foreach($data as $key => $value)
                  <label for="{{ $indexKey }}{{ $index }}" class="block font-medium text-sm text-gray-700" id="{{ $label1 }}{{ $index }}">Edit key number {{ $index }}</label>
                <input type="text" name="{{ $indexKey }}{{ $index }}" id="{{ $indexKey }}{{ $index }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ $key }}" required>
                 <label for="{{ $indexValue }}{{ $index2 }}" class="block font-medium text-sm text-gray-700" id="{{ $label2 }}{{ $index2 }}">Edit value number {{ $index2 }}</label>
                <input type="text" name="{{ $indexValue }}{{ $index2 }}" id="{{ $indexValue }}{{ $index2 }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ $value }}" required>
                <button type="button" id="{{ $button }}{{ $index }}" class="inline-flex items-center px-4 py-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="removeFieldById(this)">Remove key val fields</button>
             @php
                $index++;
                $index2++;
                $number_of_fields+=2;
             @endphp
             @endforeach

        </div>

         <div class="flex items-center gap-4">

            <button type="button" id="newvals" class="
            inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            onclick="addNewTextFields()">Add new key val text field</button>




               <button type="button" id="newvals" class="
            inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            onclick="removeAllFields()">Remove all fields</button>


               <button type="button" id="newvals" class="
            inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            onclick="resetKeyValues()">Reset indexes</button>

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
