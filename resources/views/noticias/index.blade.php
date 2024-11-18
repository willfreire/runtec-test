<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciamento de Notícias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('noticias.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md mb-8 inline-block hover:bg-blue-600 transition duration-200">Cadastrar Notícia</a>
                    
                    <div class="overflow-x-auto">
                        <table id="noticiasTable" class="min-w-full table-auto text-sm text-gray-900 dark:text-gray-100">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-xs text-gray-600 dark:text-white uppercase">
                                <tr>
                                    <th class="px-6 py-3 text-left">ID</th>
                                    <th class="px-6 py-3 text-left">Título</th>
                                    <th class="px-6 py-3 text-left">Autor</th>
                                    <th class="px-6 py-3 text-left">Temas</th>
                                    <th class="px-6 py-3 text-left">Data de Cadastro</th>
                                    <th class="px-6 py-3 text-left">Ações</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#noticiasTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('noticias.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'autor', name: 'autor' },
                    { data: 'temas', name: 'temas', orderable: false, searchable: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                language: {
                    search: "Pesquisar:",
                    lengthMenu: "Mostrar _MENU_ entradas",
                    zeroRecords: "Nenhum registro encontrado",
                    info: "Mostrando _PAGE_ de _PAGES_",
                    infoEmpty: "Nenhum registro disponível",
                    infoFiltered: "(filtrado de _MAX_ registros totais)"
                }
            });
        });
    </script>
    @endsection
</x-app-layout>