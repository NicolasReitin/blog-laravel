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
                    <form style="border-bottom: solid 10px white" action="{{ route('comment.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mt-10 flex flex-col">
                            <label class="text-white text-xl" for="content">Lache ton commentaire</label>
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
                            class="mt-5 mb-10 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Envoyer
                        </button>
                    </div>
                </form>
                @else
                    <p class="text-gray-400 mt-10">Pour lacher un commentaire, <a class="underline" href="{{ route('login') }}">connecte </a> ou <a class="underline" href="{{ route('register') }}">enregistre</a> toi!</p>
                @endauth
                <div class="mt-10 mb-64">
                    <h3 class="text-white text-xl">Commentaires précédents :</h3>
                    @isset($comments)
                        @foreach ($comments as $comment)
                            @if ($article->id === $comment->article_id)
                            <div class="relative border p-5 mt-5 rounded">
                                <h4 class="text-white">{{ ucfirst($comment->commentBy->name) }} <span class="text-gray-600">&nbsp;-&nbsp; {{ $comment->created_at }}</span></h4>
                                <div class="">
                                    <p class="text-gray-300 text-sm w-{80%}">{{ $comment->content }}</p>
                                    @auth                                        
                                        @if (Auth::user()->id === $comment->user_id)
                                        
                                        <a class="absolute right-0 top-5" href="{{ route('comment.edit', $comment) }}">
                                            <button class="text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2" type="button">Edit</button>
                                        </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    @endisset

</x-app-layout>