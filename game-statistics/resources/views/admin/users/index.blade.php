<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                        <table class="min-w-full border">
                           <thead>
                            <tr class="bg-gray-50">  
                                <th class="border px-3 py-2 text-left"> Full Name</th>    
                                <th class="border px-3 py-2 text-left"> Email</th>    
                                <th class="border px-3 py-2 text-left"> User type</th>    
                                <th class="border px-3 py-2 text-left"> Date of birth</th>    
                                <th class="border px-3 py-2 text-left"> Nickname</th>    
                                <th class="border px-3 py-2 text-left"> Profile picture</th>    
                                <th class="border px-3 py-2 text-left"> Actions</th>                              
                            </tr>    
                        </thead>     
                        <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td class="border px-3 py-2">{{ $u->name }}</td>
                                <td class="border px-3 py-2">{{ $u->email }}</td>
                                <td class="border px-3 py-2">{{ $u->userType === 1 ? 'Admin' : 'User' }}</td>
                                <td class="border px-3 py-2">{{ $u->dbirth?->format("d.m.Y") }}</td>
                                <td class="border px-3 py-2">{{ $u->nickname }}</td>
                                <td class="border px-3 py-2">{{ $u->profilePicture  }}</td>
                                <td class="border px-3 py-2"></td>

                            </tr>
                        @endforeach    
                        
                        </tbody>     
                        </table>
                </div>
        </div>
    </div>
</x-app-layout>
