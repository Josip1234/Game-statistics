<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                           {{ __("You're logged in!") }}
                    </div>
                   <div class="mt-1 text-sm text-gray-600">
                     <span class="font-semibold">
                      Type of user: {{ auth()->user()->userType===1 ? 'Admin' : 'User  ' }}
                      </span>
                       @if(auth()->user()->userType===1)
                       <span class="font-semibold flex gap-4">
                        Last registered user: {{ $user}}
                      </span>
                        <span class="font-semibold flex gap-4">
                        Date of registration: {{ $registered?->format("d.m.Y H:i:s")}}
                      </span>
                      @endif
                   </div>
                </div>
                   @if(session("status"))
                     <div class="mb-4 rounder-md bg-green-50 p-4 text-sm text-green-700">
                            {{ session('status') }}
                     </div>
                     @endif

            </div>
        </div>
    </div>
</x-app-layout>
