<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Bienvenue sur Gaming Blog' }}
        </h2>
        <h4 class="text-center font-semibold mt-2 text-xl text-gray-900 dark:text-gray-400 leading-tight" >
            {{ 'Le blog de l\'actu Geek' }}
        </h4>
    </x-slot>
    @isset($articles)
        <h2 class="text-center text-3xl text-white mt-10">Derniers articles</h2>
        <div class="flex justify-center">
            <div class="mt-24 grid gap-x-8 gap-y-4 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5">

                @foreach ($articles as $article)
                    <a href="{{route('articles.show', ['article' => $article])}}">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img class="h-64 md:h-48 lg:h-40 rounded w-full" src={{ $article->media}} alt={{ $article->medias }}>
                            <p class="text-white mt-5 italic font-light">{{ ucfirst($article->writedBy->name) }}<span class="text-gray-600"> &nbsp;-&nbsp; {{ $article->created_at }}</span>
                            </p>
                            <div class="text-white px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $article->title}}</div>
                                <p class="text-gray-300 text-base">
                                    {{ $article->content }}
                                </p>
                                <p>
                                    {{ dd($article->articleTag) }}
                                </p>
                            </div>
                            
                            {{-- <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                            </div> --}}
                        </div>
                    </a>
                @endforeach
            
            </div>
        </div>

    @endisset

</x-app-layout>