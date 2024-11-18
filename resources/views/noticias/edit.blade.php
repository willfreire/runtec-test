<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Notícia') }}
        </h2>
    </x-slot>

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Título -->
                        <div class="mb-4">
                            <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                            <input 
                                type="text" 
                                id="titulo" 
                                name="titulo" 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-black dark:text-black sm:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                value="{{ old('titulo', $noticia->titulo) }}"
                            >
                            @error('titulo')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Assunto -->
                        <div class="mb-4">
                            <label for="assunto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assunto</label>
                            <textarea 
                                id="assunto" 
                                name="assunto" 
                                rows="4" 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-black dark:text-black sm:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >{{ old('assunto', $noticia->assunto) }}</textarea>
                            @error('assunto')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Autor -->
                        <div class="mb-4">
                            <label for="autor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Autor</label>
                            <input 
                                type="text" 
                                id="autor" 
                                name="autor" 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-black dark:text-black sm:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                value="{{ old('autor', $noticia->autor) }}"
                            >
                            @error('autor')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Seleção de Temas -->
                        <div class="mb-4">
                            <label for="temas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Temas</label>
                            <select 
                                id="temas" 
                                name="temas[]" 
                                multiple 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-black dark:text-black sm:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            >
                                @foreach ($temas as $tema)
                                    <option value="{{ $tema->id }}" 
                                        @if(in_array($tema->id, $noticia->temas->pluck('id')->toArray())) 
                                            selected 
                                        @endif
                                    >
                                        {{ $tema->tema }}
                                    </option>
                                @endforeach
                            </select>
                            @error('temas')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Salvar Notícia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#temas').select2();
        });
    </script>
</x-app-layout>