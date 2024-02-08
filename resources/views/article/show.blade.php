<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Actus' }}
        </h2>
    </x-slot>
    @isset($article)
        <h2 class="text-center text-4xl text-white mt-10 font-bold">{{$article->title }}</h2>
        <div class="flex justify-center">
            <div>
                <img 
                    style="width: 900px" 
                    class="rounded mt-10" 
                    src="{{ $article->media }}" 
                    alt=""
                >
                <p class="text-xl text-white mt-10 italic font-light">
                    {{ ucfirst($article->writedBy->name) }}
                    <span class="text-gray-600">
                        &nbsp;-&nbsp;
                        {{ $article->created_at }}
                    </span>
                </p>
                <p class="text-xl text-white mt-10 font-light">
                    {{$article->content }}
                </p>
                @auth
                    <form action="{{ route('comment.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mt-10 flex flex-col">
                            <label class="text-white" for="content">Commentaire</label>
                            <textarea 
                            name="content" 
                            id="content" 
                            cols="50" 
                            rows="3"
                            class="rounded bg-gray-900 text-white"></textarea>
                        </div>
                        <div>
                            <button 
                            type="submit" 
                            class="mt-5 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Envoyer
                        </button>
                    </div>
                </form>
                @endauth
                <div class="mt-5">
                    
                </div>
            </div>
        </div>
    @endisset

</x-app-layout>