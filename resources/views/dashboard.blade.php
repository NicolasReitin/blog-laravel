<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>


    <h2 class="text-white text-2xl mt-5 ml-5 underline">Users list</h2>
    <p>
        <a href="{{ route('users') }}">
            <button type="button" class=" mt-5 ml-5 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">List access</button>
        </a>
    </p>


</x-app-layout>
