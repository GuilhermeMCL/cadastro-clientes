<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    
       public function buscarEndereco(Request $request)
{
    $cep = $request->input('cep');

    if (empty($cep) || strlen($cep) != 8) {
        return response()->json(['error' => 'CEP inválido'], 400);
    }

    try {
        // Acessa a API ViaCEP
        $response = Http::withoutVerifying()->get("https://viacep.com.br/ws/{$cep}/json/");
        
        if ($response->failed()) {
            return response()->json(['error' => 'Erro ao consultar o CEP'], 500);
        }

        // Verifica se a resposta contém erro
        $data = $response->json();
        if (isset($data['erro']) && $data['erro'] == 'true') {
            return response()->json(['error' => 'CEP não encontrado'], 404);
        }

        return response()->json($data);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao se comunicar com a API ViaCEP: ' . $e->getMessage()], 500);
    }
}
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('clientes.create');
    }

    // Armazena o cliente no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|unique:clientes,cpf_cnpj',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string',
            'cep' => 'required|string',
            'rua' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
        ]);

        Cliente::create([
            'nome' => $request->nome,
            'cpf_cnpj' => $request->cpf_cnpj,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Exibe todos os clientes cadastrados
public function index()
{
    $clientes = Cliente::all();
    return view('clientes.index', compact('clientes'));
}

    // Exibe o formulário para editar o cliente
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza os dados do cliente
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|unique:clientes,cpf_cnpj,' . $cliente->id,
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string',
            'cep' => 'required|string',
            'rua' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    // Exclui o cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
