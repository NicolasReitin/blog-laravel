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
            </div>
        </div>

    @endisset

</x-app-layout>