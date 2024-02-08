<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Users List' }}
        </h2>
    </x-slot>
    @isset($user)
        <div class="flex justify-center">
            <form 
                class="mt-5"
                action="{{ route('user.update', ['user' => $user->id]) }}" 
                method="POST">
                @csrf
                @method('PUT')
            
                <div class="mb-4">
                    <label for="name" class="block text-gray-500 font-bold mb-2">Name:</label>
                    <input 
                        class="form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ $user->name }}"
                    >
                </div>
            
                <div class="mb-4">
                    <label for="email" class="block text-gray-500 font-bold mb-2">Email:</label>
                    <input 
                        class="form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ $user->email }}"
                    >
                </div>
            
                <div class="mb-4">
                    <label for="role" class="block text-gray-500 font-bold mb-2">Role:</label>
                    <select 
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                        name="role" 
                        id="role"
                    >
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            
                <div class="mt-6">
                    <button 
                        type="submit" 
                        class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Valider les modifications
                    </button>
                </div>
            </form>
            
            

        </div>

    @endisset

</x-app-layout>