@extends ('adminlte::page')
@section ('title','Clientes')
@section ('content_header')
@stop
@section('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $clientes->nome}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($clientes,['method'=>'PATCH','route'=>['clientes.update',$clientes->idclientes]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nome">Nome</label>
            	<input type="text" name="nome" class="form-control" value="{{$clientes->nome}}" placeholder="Nome...">
            </div>
            <div class="form-group">
            	<label for="endereco">Endereço</label>
            	<input type="text" name="endereco" class="form-control" value="{{$clientes->endereco}}" placeholder="Endereço...">
            </div>
			<div class="form-group">
            	<label for="telefone">Telefone</label>
            	<input type="text" name="telefone" class="form-control" value="{{$clientes->telefone}}" placeholder="Telefone...">
            </div>
			<div class="form-group">
            	<label for="obs">Observação</label>
            	<input type="text" name="obs" class="form-control" value="{{$clientes->obs}}" placeholder="Observações...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop