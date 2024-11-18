<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Notícia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Título</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $noticia->titulo }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assunto</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $noticia->assunto }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Autor</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $noticia->autor }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Cadastro</label>
                        <p class="text-gray-900 dark:text-gray-100">{{ $noticia->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Temas</label>
                        <ul class="text-gray-900 dark:text-gray-100">
                            @foreach ($temas as $tema)
                                <li>{{ $tema->tema }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('noticias.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>