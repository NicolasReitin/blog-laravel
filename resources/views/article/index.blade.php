<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Actus' }}
        </h2>
    </x-slot>
    @isset($articles)
        <h2 class="text-center text-3xl text-white mt-10">Derniers articles</h2>
{{-- ---------------------------------------- --}}

<div class="mt-5 ml-48 relative inline-block">
    <div>
        <button 
            type="button" 
            class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-black" 
            id="menu-button" 
            aria-expanded="false" 
            aria-haspopup="true"
            >
                Créer un article
            <svg 
                class="-mr-1 h-5 w-5 text-gray-400" 
                viewBox="0 0 20 20" 
                fill="currentColor" 
                aria-hidden="true"
                >
                <path 
                    fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" 
                />
            </svg>
        </button>
    </div>

    <!-- Dropdown menu -->
    <div class="absolute right-50 z-10 mt-2 w-56 origin-top-right rounded-md bg-gray-900 border-2 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden text-white" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="menu">
        <div class="py-1" role="none">
            <form method="POST" action="{{ route('article.store') }}" role="post">
                @csrf
                <label class="ml-5" for="title">Title</label>
                <input 
                    type="text" 
                    style="width: 80%"
                    name="title" 
                    placeholder="Article title" 
                    class="ml-5 rounded block w-full px-4 py-2 text-sm mb-2 text-black">
                <label class="ml-5" for="title">Content</label>
                <textarea 
                    name="content" 
                    style="width: 80%"
                    placeholder="Article content" 
                    class="ml-5 rounded block w-full px-4 py-2 text-sm mb-2 text-black"></textarea>
                <label class="ml-5" for="title">Media</label>
                <input 
                    type="text" 
                    style="width: 80%"
                    name="media" 
                    placeholder="Url image or video" 
                    class="ml-5 rounded block w-full px-4 py-2 text-sm mb-2 text-black">
                <button 
                    type="submit" 
                    class="ml-16 mt-2 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    role="menuitem" 
                    tabindex="-1"
                    >
                        Create
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const menuButton = document.getElementById('menu-button');
    const menu = document.getElementById('menu');

    menuButton.addEventListener('click', function() {
        const isExpanded = menu.getAttribute('aria-expanded') === 'true';

        if (isExpanded) {
            menu.setAttribute('aria-expanded', 'false');
            menu.classList.add('hidden');
        } else {
            menu.setAttribute('aria-expanded', 'true');
            menu.classList.remove('hidden');
        }
    });
</script>



{{-- ---------------------------------------- --}}

        <div class="flex justify-center">
            <div class="mt-16 grid gap-x-8 gap-y-4 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5">

                @foreach ($articles as $article)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <a href="{{route('article.show', $article)}}">
                            <img class="h-64 md:h-48 lg:h-40 rounded w-full" src={{ $article->media}} alt={{ $article->medias }}>
                            <p class="text-white mt-5 italic font-light">{{ ucfirst($article->writedBy->name) }}<span class="text-gray-600"> &nbsp;-&nbsp; {{ $article->created_at }}</span>
                            </p>
                            <div class="text-white px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $article->title}}</div>
                                <p class="text-gray-300 text-base" style="min-height: 80px">
                                    {{ $article->content }}
                                </p>
                                <p style="height: 50px"
                                >
                                    @if ($article->articleTag->isNotEmpty())
                                        @foreach ($article->articleTag as $tag)
                                        <a 
                                            href="" 
                                            onclick="event.stopPropagation()"
                                        >
                                            <span class="mt-5 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $tag->title}}</span>
                                        </a>
                                        @endforeach
                                    @else

                                    @endif
                                </p>
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <div class="flex justify-center gap-5 mt-5">
                                            <form action="{{ route('article.edit', $article) }}" method="GET">
                                                @csrf
                                                <button 
                                                    type="submit" 
                                                    onclick="event.stopPropagation()"
                                                    class="text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2"
                                                >
                                                    Edit
                                                </button>
                                            </form>
                                            <form action="{{ route('article.destroy', ['article' => $article]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="submit" 
                                                    onclick="return confirm('Are you sure to delete this user?'), event.stopPropagation()"
                                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2"
                                                >
                                                    X
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth 
                            </div>
                        </a>
                        </div>
                @endforeach
            
            </div>
        </div>

    @endisset

</x-app-layout>