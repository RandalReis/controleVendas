@extends ('adminlte::page')
@section ('title','Gastos')
@section ('content_header')
<h1></h1>
@stop
@section('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Gasto: {{ $gastos->descricao}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($gastos,['method'=>'PATCH','route'=>['gastos.update',$gastos->idgastos]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" name="descricao" class="form-control" value="{{$gastos->descricao}}" placeholder="Descrição">
            </div>
            <div class="form-group">
            	<label for="valor">Valor</label>
            	<input type="number" name="valor" class="form-control" value="{{$gastos->valor}}" placeholder="Valor">
            </div>
			<div class="form-group">
            	<label for="mes">Mês</label>
            	<input type="text" name="mes" class="form-control" value="{{$gastos->mes}}" placeholder="mes">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop