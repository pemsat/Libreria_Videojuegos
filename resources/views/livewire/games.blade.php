<div class="w-full" id="inicio">
    <div class=" bg-indigo-50">
        <!-- Header -->
        <header>
            <h1 class="bg-white py-4 text-center">
                <a href="#" class="text-xl font-bold text-gray-700 cursor-pointer">Galería de juegos
            </h1>
            </h1>
        </header>
        <div class="flex items-center p-5">
            <button
                class="rounded-md bg-blue-500 py-2 px-4 font-semibold text-white shadow-md hover:shadow-lg transition-all"
                wire:click="showModal">
                Añadir Juego nuevo
            </button>
        </div>
        <section class="min-h-screen body-font text-gray-600 ">
            <div class="container mx-auto px-5 py-10">
                <div class="-m-4 flex flex-wrap">
                    @foreach ($games as $game)
                        <div class="w-full p-4 md:w-1/2 lg:w-1/4">
                            <a href="{{ route('game.detail', ['id' => $game->id]) }}"
                                class="relative block h-48 overflow-hidden rounded">
                                <img alt="Game Cover"
                                    class="block h-full w-full object-cover object-center cursor-pointer"
                                    src="{{ $game->cover ? asset('storage/gameCovers/' . $game->cover) : asset('img/default-cover.png') }}" />
                            </a>
                            <div class="mt-4">
                                <h3 class="title-font mb-1 text-xs tracking-widest text-gray-500">
                                    {{ $game->title }}</h3>
                                <p class="title-font text-lg font-medium text-gray-900">{{ $game->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

    Add Game Modal
    @if ($modalOpen)
        <div
            class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10 z-50">
         <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">
                                Crear Nuevo Juego
                            </h1>
                            <form>
                                <div class="space-y-4">
                                    <div>
                                        <label for="title"
                                            class="block text-sm font-medium text-gray-700">Título</label>
                                        <input type="text" wire:model="title" name="title" id="title"
                                            autocomplete="title"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Descripción</label>
                                        <textarea type="text" wire:model="description" name="description" id="description" autocomplete="description"
                                            rows="3"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div class="mb-6">
                                        <label class="text-white text-sm">Game Cover (optional)</label>
                                        <input type="file" wire:model="cover"
                                            class="w-full p-3 text-white bg-none rounded-lg text-sm">
                                        @error('cover')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="space-y-4">
                            <button class="p-3 bg-black rounded-full text-white w-full font-semibold"
                                wire:click="createGame">
                                crear
                            </button>
                            <button class="p-3 bg-white border rounded-full w-full font-semibold"
                                wire:click="closeModal">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

