<?php

namespace App\Http\Controllers;
use App\Models\Condominium;
use App\Http\Requests\CondominiosRequest;
use Illuminate\Http\Request;

class CondominiosController extends Controller
{
    public function index()
    {
        $condominios = Condominium::paginate(10);
        return view('condominios.visualizarCondominios', compact('condominios'));
    }

    public function create()
    {
        return view('condominios.create');
    }

    public function store(CondominiosRequest $request)
    {
        $address = "{$request->address_type} {$request->address_street}, Nº {$request->address_number}, "
                . "{$request->address_neighborhood}, {$request->address_city} - {$request->address_state}, "
                . "{$request->address_country}, CEP: {$request->address_cep}";

        Condominium::create([
            'name' => $request->name,
            'address' => $address,
            'responsible' => $request->responsible,
            'contact' => $request->contact,
        ]);

        return redirect()->route('condominios.visualizarCondominios')->with('mensagem', 'Condomínio criado com sucesso!');
    }


    public function show(string $id)
    {

    }

    public function edit(Condominium $condominio)
    {
        return view('condominios.edit', compact('condominio'));
    }

    public function update(Request $request, string $id)
    {
        $condominios = Condominium::findOrFail($id);

        $address = "{$request->address_type} {$request->address_street}, Nº {$request->address_number}, "
                . "{$request->address_neighborhood}, {$request->address_city} - {$request->address_state}, "
                . "{$request->address_country}, CEP: {$request->address_cep}";

        $dados = [
            'name' => $request->name,
            'address' => $address,
            'responsible' => $request->responsible,
            'contact' => $request->contact,
        ];

        $condominios->update($dados);

        return redirect()->route('condominios.visualizarCondominios')->with('mensagem', 'Condomínio atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $condominios = Condominium::findOrFail($id);
        $condominios->delete();
        return redirect()->route('condominios.visualizarCondominios')->with('mensagem', 'Condomínio excluído com sucesso!');
    }
}
