<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User edit') }}


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('layouts.navigation2')
                    <form method="post" action="{{ route('admin.users.update',$user) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                             <x-input-label for="userType" :value="__('Update type of user')" />
                             <select name="userType" id="userType" class="mt-1 block w-full">
                                <option value="1" @selected(old('userType',$user->userType)==1)>Administrator</option>
                                <option value="0" @selected(old('userType',$user->userType)==0)>User</option>
                             </select>
                             <x-input-error :messages="$errors->get('userType')" class="mt-2"/>
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
