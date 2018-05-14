@extends ('adminlte::page')
@section ('title','Rendimentos')
@section ('content_header')
@stop
@section('content')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Entradas <a href="rendimentos/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('rendimentos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Mês</th>
					<th>Total</th>
					<th>Opções</th>
				</thead>
               @foreach ($rendimentos as $cat)
				<tr>
					<td>{{ $cat->idrendimentos}}</td>
					<td>{{ $cat->mes}}</td>
					<td>{{ $cat->total}}</td>
					<td>
						<a href="{{URL::action('RendimentosController@edit',$cat->idrendimentos)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idrendimentos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('rendimentos.modal')
				@endforeach
			</table>
		</div>
		{{$rendimentos->render()}}
	</div>
</div>

@stop