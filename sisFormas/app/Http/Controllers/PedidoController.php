<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pedido;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PedidoFormRequest;
use DB;

class PedidoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
       if ($request)
       {
           $query=trim($request->get('searchText'));
           $pedido=DB::table('pedido as pe')
           ->join('clientes as cli','pe.idclientes','=','cli.idclientes')        
           ->select('pe.idclientes','cli.nome')
           ->where('pe.descricao','LIKE','%'.$query.'%')
           ->orderBy('pe.idpedido','desc')
           
           ->paginate(7);
           return view('pedido.index',["pedido"=>$pedido,"searchText"=>$query]);       
        }  
    }  
    public function create()
    {
        
        return view("pedido.create");
    }  
       public function store (PedidoFormRequest $request)
       {
        $pedido=new Pedido;
        $pedido->descricao=$request->get('descricao');
        $pedido->quantidade=$request->get('quantidade');
        $pedido->valorPar=$request->get('valorPar');
        $pedido->total=$request->get('total');
        $pedido->condPag=$request->get('condPag');
        $pedido->mes=$request->get('mes');
        $pedido->obs=$request->get('obs');
        $pedido->idcliente=$request->get('idcliente');
        $pedido->save();
        return Redirect::to('pedido');

           
       }
       public function show($id)
       {
           $pedido=DB::table('pedido as pe')
           ->join('clientes as cli','pe.idclientes','=','cli.idclientes')        
           ->where('pe.pedido','=',$id) 
           ->first();
           return view("pedido.show",["pedido"=>$pedido,"clientes"=>$clientes]);
        }
    public function destroy($id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->update();
        return Redirect::to('pedido');
    }
}
