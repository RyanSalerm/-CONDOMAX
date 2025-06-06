<?php

namespace App\Http\Controllers;
use App\Models\Provider;
use App\Http\Requests\PrestadorRequest;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    public function index()
    {
        $prestadores = Provider::paginate(10);
        return view('prestadoresServico.visualizarPrestadores', compact('prestadores'));
    }

    public function create()
    {
        return view('prestadoresServico.create');
    }

    public function store(PrestadorRequest $request)
    {
        Provider::create([
            'name' => $request->name,
            'area' => $request->area,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
        ]);

        return redirect()->route('prestadoresServico.visualizarPrestadores')->with('mensagem', 'Prestador criado com sucesso!');
    }
    

    public function show(string $id)
    {

    }

    public function edit(Provider $prestador)
    {
        return view('prestadoresServico.edit', compact('prestador'));
    }

    public function update(Request $request, string $id)
    {
        $prestadores = Provider::findOrFail($id);
        $dados = [
            'name' => $request->name,
            'area' => $request->area,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
        ];
        $prestadores->update($dados);
        return redirect()->route('prestadoresServico.visualizarPrestadores')->with('mensagem', 'Prestador atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $prestadores = Provider::findOrFail($id);
        $prestadores->delete();
        return redirect()->route('prestadoresServico.visualizarPrestadores')->with('mensagem', 'Prestador excluído com sucesso!');
    }
}
