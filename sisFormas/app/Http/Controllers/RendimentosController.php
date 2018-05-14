<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rendimentos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RendimentosFormRequest;
use DB;

class RendimentosController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $rendimentos=DB::table('rendimentos')->where('mes','LIKE','%'.$query.'%')
            ->orderBy('idrendimentos','desc')
            ->paginate(7);
            return view('rendimentos.index',["rendimentos"=>$rendimentos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("rendimentos.create");
    }
       public function store (RendimentosFormRequest $request)
       {
        $rendimentos=new Rendimentos;
        $rendimentos->mes=$request->get('mes');
        $rendimentos->total=$request->get('total');
        return Redirect::to('rendimentos');

           
       }
       public function show($id)
       {
           return view("rendimentos.show",["rendimentos"=>Rendimentos::findOrFail($id)]);
        }
        public function edit($id)
        {
            return view("rendimentos.edit",["rendimentos"=>Rendimentos::findOrFail($id)]);
        }
    public function destroy($id)
    {
        $rendimentos=Rendimentos::findOrFail($id);
        $rendimentos->delete();
        return Redirect::to('rendimentos');
    }
}
