<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Gastos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GastosFormRequest;
use DB;

class GastosController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $gastos=DB::table('gastos')->where('descricao','LIKE','%'.$query.'%')
            ->orderBy('idgastos','desc')
            ->paginate(7);
            return view('gastos.index',["gastos"=>$gastos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("gastos.create");
    }
    public function store (GastosFormRequest $request)
    {
        $gastos=new Gastos;
        $gastos->descricao=$request->get('descricao');
        $gastos->valor=$request->get('valor');
        $gastos->mes=$request->get('mes');
        $gastos->save();
        return Redirect::to('gastos');
    }
    public function show($id)
    {
        return view("gastos.show",["gastos"=>Gastos::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("gastos.edit",["gastos"=>Gastos::findOrFail($id)]);
    }
    public function update(GastosFormRequest $request,$id)
    {
        $gastos=Gastos::findOrFail($id);
        $gastos->descricao=$request->get('descricao');
        $gastos->valor=$request->get('valor');
        $gastos->mes=$request->get('mes');
        $gastos->update();
        return Redirect::to('gastos');
    }
    public function destroy($id)
    {
        $gastos=Gastos::findOrFail($id);
        $gastos->delete();
        return Redirect::to('gastos');
    }
}
