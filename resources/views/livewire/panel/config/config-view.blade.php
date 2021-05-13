<div class="max-w-4xl mx-auto pb-10 px-4 sm:px-6 lg:px-8">

    <div>
        <h1 class="text-3xl font-bold text-main-dark">{{ $pageTitle }}</h1>
        <p class="text-xs text-gray-400">{{ $pageInfo }}</p>
    </div>

    <div class="w-full mt-8">

               

        <form wire:submit.prevent="update">

            <div class="w-full mb-6 text-right">
                <button class="bg-main-green text-white px-6 py-4 rounded-lg hover:shadow-lg" type="submit">Salvar</button>
            </div>

            
            <div class="mb-4 pt-6">
                @if (session()->has('message'))
                    <div class="bg-green-200 rounded-lg text-black px-4 py-2 mb-3 text-xs">
                        {{ session('message') }}
                    </div>
                @endif
            </div>


            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Titulo da Página Principal</h1>
                <div class="grid gap-4">
                    <input wire:model="title_project" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Titulo principal">
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Link redes Sociais</h1>
                <div class="grid grid-cols-2 gap-4">
                    <input wire:model="link_facebook" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Link Facebook">
                    <input wire:model="link_instagram" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Link Instagram">
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <input wire:model="link_youtube" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Link Youtube">
                    <input wire:model="link_linkedin" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Link Linkedin">
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Api Whatsapp</h1>
                <div class="grid gap-4">
                    <input wire:model="link_whatsapp" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Link da api">
                </div>
            </div>
            
            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Iframe Google Maps</h1>
                <div class="grid gap-4">
                    <input wire:model="iframe_googlemaps" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Link do compartilhamento do google">
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg mt-4">
                <h1 class="mb-4 text-xs text-gray-400">Dados do Contato</h1>
                <div class="grid grid-cols-2 gap-4">
                    <input wire:model="phone_fixo" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Fone Fixo">
                    <input wire:model="phone_cell" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Fone Celular">
                </div>
                <div class="grid gap-4 mt-4">
                    <input wire:model="address" class="w-full p-4 border border-gray-300 rounded-xl" type="text" placeholder="Endereço">
                </div>
            </div>

            <div class="w-full mt-6 mb-4 text-right">
                <button class="bg-main-green text-white px-6 py-4 rounded-lg hover:shadow-lg" type="submit">Salvar</button>
            </div>
        </form>
        
    </div>


</div>