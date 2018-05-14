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
           ->join('clientes as cli','cli.idclientes','=','pe.idclientes')        
        //    ->select('pe.idclientes','cli.idclientes')
           ->where('pe.descricao','LIKE','%'.$query.'%')
           ->orderBy('pe.idpedido','desc')
           ->get();

        //    return response()->json($pedido);
            
           return view('pedido.index',["pedido"=>$pedido,"searchText"=>$query]); 
                 
        }  
    }  
    public function create()
    {
        $clientes=DB::table('clientes')->get();
        return view("pedido.create",["clientes"=>$clientes]);
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
        $pedido->idclientes=$request->get('idclientes');
        $pedido->save();
        return Redirect::to('pedido');

           
       }
       public function show($id)
       {
           return view("pedido.show",["pedido"=>Pedido::findOrFail($id)]);
        }
        public function edit($id)
    {
        $pedido=Pedido::findOrFail($id);
        $clientes=DB::table('clientes')->get();
        return view("pedido.edit",["pedido"=>$pedido,"clientes"=>$clientes]);
    }
    public function destroy($id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->delete();
        return Redirect::to('pedido');
    }
}
