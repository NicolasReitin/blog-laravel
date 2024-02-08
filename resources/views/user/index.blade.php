<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Users List' }}
        </h2>
    </x-slot>
    @isset($users)
        <div class="flex justify-center">
            <div class="overflow-x-auto">
                <table class="mt-5 min-w-full divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Email Verified At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Updated At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->email_verified_at }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->role }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->created_at }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $user->updated_at }}</div>
                            </td>
                            <td class="flex px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('user.edit', $user->id) }}">
                                    <button 
                                        type="button" 
                                        class="text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2"
                                    >
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('user.destroy', ['user' => $user]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Are you sure to delete this user?')"
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2"
                                    >
                                        X
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
            

        </div>

    @endisset

</x-app-layout>

<a href="{{ route('user.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
    <button 
        type="button" 
        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2"
    >
        X
    </button>
</a>