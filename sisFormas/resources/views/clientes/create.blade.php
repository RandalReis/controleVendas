@extends ('adminlte::page')
@section ('title','Clientes')
@section ('content_header')
<h1></h1>
@stop
@section('content')
  <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Novo Cliente</h3>
        @if (count($errors)>0)
        <div class="alert" alert-danger>
            <ul>
              @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
              @endforeach 
            </ul>
        </div>
        @endif 
        {!!Form::open(array('url'=>'clientes','method'=>'POST','autocomplete'=>'off')) !!}
        {{Form::token()}} 

        <div class="form-group">
           <label for="nome">Nome</label>
           <input type="text" name="nome" class="form-control" placeholder="Nomes">
        </div>

        <div class="form-group">
           <label for="endereco">Endereco</label>
           <input type="text" name="endereco" class="form-control" placeholder="Endereço">
        </div>
        <div class="form-group">
           <label for="telefone">Telefone</label>
           <input type="text" name="telefone" class="form-control" placeholder="Telefone">
        </div>
        <div class="form-group">
           <label for="obs">Observações</label>
           <input type="text" name="obs" class="form-control" placeholder="Observações">
        </div>
        <div class="form-group">
           <button class="btn btn-primary" type="submit">Salvar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
     </div>
  </div>
@stop