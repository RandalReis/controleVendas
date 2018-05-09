@extends ('adminlte::page')
@section ('title','Gastos')
@section ('content_header')
<h1></h1>
@stop
@section('content')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Gastos <a href="gastos/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('gastos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descrição</th>
					<th>Valor</th>
					<th>Mês</th>
					<th>Opções</th>
				</thead>
               @foreach ($gastos as $cat)
				<tr>
					<td>{{ $cat->idgastos}}</td>
					<td>{{ $cat->descricao}}</td>
					<td>{{ $cat->valor}}</td>
					<td>{{ $cat->mes}}</td>
					<td>
						<a href="{{URL::action('GastosController@edit',$cat->idgastos)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idgastos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('gastos.modal')
				@endforeach
			</table>
			<input type="button" class="btn btn-warning" name="imprimir" value="Imprimir" onclick="window.print();">
		</div>
		{{$gastos->render()}}
	</div>
</div>

@endsection