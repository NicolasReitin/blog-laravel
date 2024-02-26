<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Articles à valider' }}
        </h2>
    </x-slot>
    @isset($articlessNotValidates)
        
{{-- ---------------------------------------- --}}

        <div class="flex justify-center">
            <div class="overflow-x-auto">
                <table class="mt-5 min-w-full divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Media
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Approve
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($articlessNotValidates as $article)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $article->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap" >
                                <div class="text-sm text-white">{{ $article->content }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap" >
                                <div class="text-sm text-white">{{ $article->media }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('article.approved', $article) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Approve</button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $article->role }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white">{{ $article->created_at }}</div>
                            </td>
                            <td class="flex px-6 py-4 whitespace-nowrap">
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Are you sure to delete this user?')"
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2"
                                    >
                                        X
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            

        </div>

    @endisset

</x-app-layout>