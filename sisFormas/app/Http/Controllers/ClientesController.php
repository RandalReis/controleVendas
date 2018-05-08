<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clientes;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClientesFormRequest;
use DB;

class ClientesController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('clientes')->where('nome','LIKE','%'.$query.'%')
            
            ->orderBy('idclientes','desc')
            ->paginate(7);
            return view('clientes.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("clientes.create");
    }
    public function store (ClientesFormRequest $request)
    {
        $clientes=new Clientes;
        $clientes->nome=$request->get('nome');
        $clientes->endereco=$request->get('endereco');
        $clientes->telefone=$request->get('telefone');
        $clientes->obs=$request->get('obs');
        $clientes->save();
        return Redirect::to('clientes');
    }
    public function show($id)
    {
        return view("clientes.show",["clientes"=>Clientes::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("clientes.edit",["clientes"=>Clientes::findOrFail($id)]);
    }
    public function update(ClientesFormRequest $request,$id)
    {
        $clientes=Clientes::findOrFail($id);
        $clientes->nome=$request->get('nome');
        $clientes->endereco=$request->get('endereco');
        $clientes->telefone=$request->get('telefone');
        $clientes->obs=$request->get('obs');
        $clientes->update();
        return Redirect::to('clientes');
    }
    public function destroy($id)
    {
        $clientes=Clientes::findOrFail($id);
        $clientes->delete();
        return Redirect::to('clientes');
    }
    public function teste($id)
    {
        return "deu certo: {$id}";
    }
}
