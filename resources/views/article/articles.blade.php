<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Actus' }}
        </h2>
    </x-slot>
    @isset($articles)
        <h2 class="text-center text-3xl text-white mt-10">Derniers articles</h2>
        <div class="flex justify-center">
            <div class="mt-16 grid gap-x-8 gap-y-4 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5">

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
                                    @if ($article->articleTag->isNotEmpty())
                                        @foreach ($article->articleTag as $tag)
                                            <span class="mt-5 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $tag->title}}</span>
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            
            </div>
        </div>

    @endisset

</x-app-layout>