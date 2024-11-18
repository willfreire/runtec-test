<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Tema;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('noticias.index');
    }

    public function getNoticias()
    {
        $noticias = Noticia::with('temas')->select('tb_noticia.*');

        return datatables()->of($noticias)
            ->addColumn('temas', function ($noticia) {
                return $noticia->temas->pluck('tema')->implode(', ');
            })
            ->addColumn('created_at', function ($noticia) {
                return $noticia->created_at->format('d/m/Y H:i');
            })
            ->orderColumn('created_at', function($query, $order) {
                $query->orderBy('created_at', $order);
            })
            ->addColumn('actions', function ($noticia) {
                return '
                    <a href="' . route('noticias.edit', $noticia->id) . '" class="btn btn-warning btn-sm">Editar</a>
                    <a href="' . route('noticias.show', $noticia->id) . '" class="btn btn-info btn-sm">Visualizar</a>
                    <!-- <form action="' . route('noticias.destroy', $noticia->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form> -->';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temas = Tema::all();
        return view('noticias.create', compact('temas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:250',
            'assunto' => 'required|string',
            'autor' => 'required|string',
            'temas' => 'required|array',
            'tb_temas.*' => 'exists:temas,id',
        ]);

        // Cria a notícia
        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'assunto' => $request->assunto,
            'autor' => $request->autor,
        ]);

        // Associa os temas à notícia
        $noticia->temas()->attach($request->temas);

        return redirect()->route('noticias.index')->with('success', 'Notícia Criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        $temas = $noticia->temas;

        return view('noticias.show', compact('noticia', 'temas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        // Recupera todos os temas disponíveis
        $temas = Tema::all();

        // Retorna a view com os dados da notícia e os temas
        return view('noticias.edit', compact('noticia', 'temas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'assunto' => 'required|string',
            'autor' => 'required|string|max:255',
            'temas' => 'required|array',
            'tb_tema.*' => 'exists:tb_tema,id',
        ]);

        $noticia->update([
            'titulo' => $request->titulo,
            'assunto' => $request->assunto,
            'autor' => $request->autor,
        ]);

        $noticia->temas()->sync($request->temas);

        return redirect()->route('noticias.index')->with('success', 'Notícia Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index')->with('success', 'Notícia Excluída com Sucesso!');
    }
}
