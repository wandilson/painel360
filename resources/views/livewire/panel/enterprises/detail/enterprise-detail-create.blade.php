<div class="max-w-4xl mx-auto pb-10 px-4 sm:px-6 lg:px-8">

    <div>
        <h1 class="text-3xl font-bold text-main-dark">{{ $pageTitle }}</h1>
        <p class="text-xs text-gray-400">{{ $pageInfo }}</p>
    </div>

    <div class="w-full mt-8">

               

        <form wire:submit.prevent="create">

            <div class="w-full mb-4 text-right">
                <a class="bg-gray-50 text-main-dark px-4 py-2 rounded-lg hover:shadow-lg" href="{{ route('panel.enterprise.details', $id_empreendimento) }}">Voltar</a>
            </div>

            
            <div class="mb-4 pt-6">
                @if (session()->has('message'))
                    <div class="bg-green-200 rounded-lg text-black px-4 py-2 mb-3 text-xs">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div wire:loading class="w-full">
                <div class="bg-main-yellow rounded-lg text-white px-4 py-2 mb-3 text-xs">Processando informações...</div>
            </div>


            <div class="grid grid-cols-1 gap-4">
                <!-- 
                    ###########################################################################
                    Uplaod de Imagem Capa
                    ###########################################################################
                -->    
                <div>
                    @if ($filename)
                        <div class="flex w-full mb-6 items-center justify-center bg-grey-lighter">
                            <img class="w-full rounded-lg" src="{{ $filename->temporaryUrl() }}">
                        </div>
                    @endif

                    <div class="flex w-full items-center justify-center bg-grey-lighter">
                        <label class="w-80 flex flex-row items-center px-4 py-6 bg-white text-main-cyan rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-main-blue hover:text-white">
                            <svg class="w-8 h-8 ml-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 ml-2 text-base leading-normal">Imagem Capa</span>
                            <input wire:model="filename" type='file' class="hidden" />
                        </label>
                    </div>
                </div>
            </div>



            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Titulo da Página Principal</h1>
                <div class="grid gap-4">
                    <input wire:model="title_project" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Titulo principal">
                </div>
            </div>


            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Descrição</h1>
                <div class="grid gap-4">
                    <textarea wire:model="description" class="w-full p-4 border border-gray-300 rounded-xl" name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="w-full mt-6 mb-4 text-right">
                <button class="bg-main-green text-white px-6 py-4 rounded-lg hover:shadow-lg" type="submit">Salvar</button>
            </div>
        </form>
        
    </div>


</div>