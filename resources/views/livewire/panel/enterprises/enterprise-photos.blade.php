<div class="max-w-4xl mx-auto pb-10 px-4 sm:px-6 lg:px-8">

    <div>
        <h1 class="text-3xl font-bold text-main-dark">{{ $pageTitle }}</h1>
        <p class="text-xs text-gray-400">{{ $pageInfo }}</p>
    </div>

    <div class="w-full mt-8">
        <div class="w-full mb-4 text-right">
            <a class="bg-gray-50 text-main-dark px-4 py-2 rounded-lg hover:shadow-lg" href="{{ route('panel.enterprise') }}">Voltar</a>
        </div>
               
        <form wire:submit.prevent="save">
            <div class="mb-4 pt-6">
                @if (session()->has('message'))
                    <div class="bg-green-200 rounded-lg text-black px-4 py-2 mb-3 text-xs">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <div class="flex w-full items-center justify-center bg-grey-lighter">
                    <label class="w-80 flex flex-row items-center px-4 py-6 bg-white text-main-cyan rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-main-blue hover:text-white">
                        <svg class="w-8 h-8 ml-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 ml-2 text-base leading-normal">Selecione a Imagem</span>
                        <input wire:model="photos" type='file' class="hidden" multiple/>
                        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                    </label>
                </div>
            </div>


            <div class="grid grid-cols-6">

                @if ($photos)
                    @foreach($photos as $photo)
                    <div>
                        <img class="rounded-lg" src="{{ $photo->temporaryUrl() }}"  width="100">
                        <button class="bg-main-red px-4 py-2 text-white rounded-lg mt-4" wire:click.prevent="removeImg({{$loop->index}})">
                            Remove
                        </button>
                    </div>
                    @endforeach
                @endif

            </div>


            
            <div class="text-right">
                <button type="submit" class="px-4 py-2 text-white text-sm font-light bg-main-blue hover:bg-main-cyan-hover rounded">Salvar</button>
            </div>
        </form>




        <div class="mt-6">
            <h1>Imagens Cadastradas</h1>
        </div>
        <div class="mb-4">
            @if (session()->has('messagemDel'))
                <div class="bg-green-200 rounded-lg text-black px-4 py-2 mb-3 text-xs">
                    {{ session('messagemDel') }}
                </div>
            @endif
        </div>
        <div class="grid grid-cols-6 gap-4">
            @foreach ($enterprise_imagens as $item)
                <div>
                    <img width="100%" class="rounded-lg" src="{{ asset("storage/{$item->filename}") }}"  width="100">
                    <button class="bg-gray-50 hover:bg-main-red hover:shadow-lg px-4 py-2 text-sm duration-150 text-main-dark hover:text-white rounded-lg mt-4" wire:click.prevent="deleteImagem({{$item->id}})">
                        Remove
                    </button>
                </div>
            @endforeach
        </div>

        
    </div>


</div>