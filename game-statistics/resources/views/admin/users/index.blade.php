<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('status'))
                        <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif
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
                                @foreach ($users as $u)
                                    <tr>
                                        <td class="border px-3 py-2">{{ $u->name }}</td>
                                        <td class="border px-3 py-2">{{ $u->email }}</td>
                                        <td class="border px-3 py-2">{{ $u->userType === 1 ? 'Admin' : 'User' }}</td>
                                        <td class="border px-3 py-2">{{ $u->dbirth?->format('d.m.Y') }}</td>
                                        <td class="border px-3 py-2">{{ $u->nickname }}</td>
                                        <td class="border px-3 py-2">
                                            @if ($u->profilePicture == null || $u->profilePicture == '')
                                                {{ __('No profile picture') }}
                                            @else
                                                <img src="/{{ $u->profilePicture }}"
                                                    alt="profile_picture{{ $u->email }}"
                                                    class="w-full h-48 object-cover object-center">
                                            @endif
                                        </td>
                                        <td class="border px-3 py-2">
                                            <a href="{{ route('admin.users.edit', $u) }}"
                                                class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-3"
                                                title="Edit">
                                                <i class="bi bi-pencil icon-edit"></i>
                                            </a>
                                            @if ($u->id !== auth()->id())
                                                <form action="{{ route('admin.users.delete', $u) }}" method="post"
                                                    class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center text-red-600 hover:text-red-800"
                                                        title="Delete">
                                                        <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">
                                                    <i class="bi bi-trash icon-delete"></i>
                                                </span>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="mt-6 flex justify-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
