@extends ('adminlte::page')
@section ('title','Clientes')
@section ('content_header')

@stop
@section('content')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Clientes<a href="{{ route('clientes.create') }}"><button class="btn btn-success">Novo</button></a></h3>
		@include('clientes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Endereco</th>
					<th>Telefone</th>
					<th>Observações</th>
					<th>Opções</th>
				</thead>
               @foreach ($clientes as $cat)
				<tr>
					<td>{{ $cat->idclientes}}</td>
					<td>{{ $cat->nome}}</td>
					<td>{{ $cat->endereco}}</td>
					<td>{{ $cat->telefone}}</td>
					<td>{{ $cat->obs}}</td>
				
					<td>
						 <a href="{{URL::action('ClientesController@edit',$cat->idclientes)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idclientes}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						 
					</td>
				</tr>
				@include('clientes.modal')
				@endforeach
			</table>
			<input type="button" class="btn btn-warning" name="imprimir" value="Imprimir" onclick="window.print();">
		</div>
		{{$clientes->render()}}
	</div>
</div>

@stop
      <form>
          <input type="button" value="Print this page" onClick="window.print()"/>
       </form>