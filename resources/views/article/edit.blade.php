<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Actus' }}
        </h2>
    </x-slot>
    @isset($article)
    <form action="{{route('article.update', $article)}}" method="POST">
        <div class="flex justify-center flex-col items-center">
            <label class="ml-5 mt-5 text-center text-white text-xl" for="title">Title</label>
            <input 
                type="text" 
                style="width: 80%"
                name="title" 
                placeholder="Article title" 
                value="{{ $article->title }}"
                class="ml-5 rounded block w-full px-4 py-2 text-sm mb-2 text-black">
        </div>
        <div class="flex justify-center">
            <div>
                @csrf
                @method('PUT')
                <img 
                    style="width: 900px" 
                    class="rounded mt-10" 
                    src="{{ $article->media }}" 
                    alt=""
                >
                <div class=" mt-5">
                    <label class="ml-5 text-white" for="title">Media</label>
                    <input 
                    type="text" 
                    style="width: 80%"
                    name="media" 
                    placeholder="Url image or video" 
                    value="{{ $article->media }}"
                    class="rounded block w-full px-4 py-2 text-sm mb-2 text-black">
                </div>
                <div class="mt-5">
                    <label class="ml-5 text-white" for="title">Content</label>
                    <textarea 
                        name="content" 
                        style="width: 80%"
                        placeholder="Article content" 
                        class="rounded block w-full px-4 py-2 text-sm mb-2 text-black"
                    >{{ $article->content }}
                    </textarea>
                </div>
                <div class="flex justify-center flex-col items-center">
                    <button 
                        type="submit" 
                        class="mt-5 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                        role="menuitem" 
                        tabindex="-1"
                    >
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>

    @endisset

</x-app-layout>