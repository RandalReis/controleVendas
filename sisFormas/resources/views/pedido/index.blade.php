@extends ('adminlte::page')
@section ('title','Clientes')
@section ('content_header')
@stop
@section('content')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Pedidos <a href="{{ route('pedido.create') }}"><button class="btn btn-success">Novo</button></a></h3>
		@include('pedido.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th>Valor por Par</th>
					<th>Total</th>
					<th>Condição de Pagamento</th>
					<th>Mês</th>
					<th>Opções</th>
				</thead>
               @foreach ($pedido as $cat)
				<tr>
					<td>{{ $cat->idpedido}}</td>
					<td>{{ $cat->descricao}}</td>
					<td>{{ $cat->quantidade}}</td>
					<td>{{ $cat->valorPar}}</td>
					<td>{{ $cat->total}}</td>
					<td>{{ $cat->condPag}}</td>
					<td>{{ $cat->mes}}</td>
					<td>
						<a href="{{URL::action('PedidoController@edit',$cat->idpedido)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idpedido}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('pedido.modal')
				@endforeach
			</table>
		</div>
		{{$pedido->render()}}
	</div>
</div>

@stop