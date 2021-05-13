<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    <div>
        <h1 class="text-3xl font-bold text-main-dark">{{ $pageTitle }}</h1>
        <p class="text-xs text-gray-400">{{ $pageInfo }}</p>
    </div>

    <div class="w-full mt-8">

        <div class="w-full mb-4 text-right">
            <a class="bg-main-blue text-white px-4 py-2 rounded-lg hover:shadow-lg hover:bg-main-blue-hover" href="{{ route('panel.institutional.create') }}">Novo</a>
        </div>


                <!-- Table -->
                <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($institutional as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        @if (isset($item->filename))
                                            <div class="inline-flex w-10 h-10">
                                                <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset("storage/{$item->filename}") }}'>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="">
                                                {{ $item->title }}
                                            </p>
                                            <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                                {{ $item->slug }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                                               
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('panel.institutional.edit', $item->id) }}" class="text-main-yellow mr-4">Edit</a>
                                    <a href="javascript:void(0)" wire:click="delete({{ $item->id }})" onclick="confirm('Deseja realmente deletar esse arquivo?') || event.stopImmediatePropagation()" class="text-main-red">Deletar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($institutional->isEmpty())
                    <div class="bg-yellow-50 text-main-dark p-4 rounded-lg mt-4 text-sm">Não há conteúdo cadastrado!</div>
                @endif
       
    </div>


</div>
