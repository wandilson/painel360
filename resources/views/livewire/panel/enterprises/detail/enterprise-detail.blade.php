<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    <div>
        <h1 class="text-3xl font-bold text-main-dark">{{ $pageTitle }}</h1>
        <p class="text-xs text-gray-400">{{ $pageInfo }}</p>
    </div>

    <div class="w-full mt-8">

        <div class="w-full mb-4 text-right">
            <a class="bg-main-blue text-white px-4 py-2 rounded-lg hover:shadow-lg hover:bg-main-blue-hover" href="{{ route('panel.enterprise.details.create', $id_empreendimento) }}">Novo</a>
        </div>

        
            <div class="grid grid-cols-3 gap-4">
                @foreach ($EnterpriseDetail as $item)
                    <div class="bg-white rounded-lg shadow-md mb-2 p-6 gap-4">
                        <span><img class="mb-4 rounded-lg" src="{{ asset("storage/{$item->filename}") }}" alt=""></span>
                        <div class="w-full text-main-dark">
                            <span class="block text-lg">
                                <span class="font-bold">Titulo:</span> {{ $item->title }}
                            </span>
                        </div>
                        <span class="block text-right mt-4">
                            <a class="mr-6 text-main-yellow" href="{{ route('panel.enterprise.details.edit', ['id_empreendimento' => $item->enterprise_id, 'id_detail' => $item->id]) }}">Editar</a>
                            <a class="text-main-red" href="javascript:void(0)" wire:click="delete({{ $item->id }})" onclick="confirm('Deseja realmente deletar esse arquivo?') || event.stopImmediatePropagation()">Deletar</a>
                        </span>
                    </div>
                @endforeach

            </div>

            @if ($EnterpriseDetail->isEmpty())
                <div class="bg-yellow-50 text-main-dark p-4 rounded-lg mt-4 text-sm">Não há conteúdo cadastrado!</div>
            @endif
        
        
    </div>


</div>
