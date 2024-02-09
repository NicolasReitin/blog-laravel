<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Modifier commentaire' }}
        </h2>
    </x-slot>
    @isset($comment)
        <form action="{{route('comment.update', $comment)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-5 flex justify-center flex-col items-center">
                <label for="content"></label>
                <textarea name="content" id="content" cols="50" rows="3">{{ $comment->content }}</textarea>
                <button class="mt-5 text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2" type="submit">Modifier</button>
            </div>
        </form>

    @endisset

</x-app-layout>