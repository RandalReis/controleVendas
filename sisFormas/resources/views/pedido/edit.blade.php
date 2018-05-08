@extends ('adminlte::page')
@section ('title','Clientes')
@section ('content_header')
@stop
@section('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Pedido: {{ $pedido->descricao}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($pedido,['method'=>'PATCH','route'=>['pedido.update',$pedido->idpedido]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" name="descricao" class="form-control" value="{{$pedido->descricao}}" placeholder="Descrição">
            </div>
            <div class="form-group">
            	<label for="quantidade">Quantidade</label>
            	<input type="number" name="quantidade" class="form-control" value="{{$pedido->quantidade}}" placeholder="Quantidade">
            </div>
			<div class="form-group">
            	<label for="valorPar">Valor por Par</label>
            	<input type="number" name="valorPar" class="form-control" value="{{$pedido->valorPar}}" placeholder="Valor por Par">
            </div>
			<div class="form-group">
            	<label for="total">Total</label>
            	<input type="number" name="total" class="form-control" value="{{$pedido->total}}" placeholder="Total">
            </div>
			</div>
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
             <label>Condição de Pagamento</label>
             <select name="condPag" class="form-control">
             @if ($pedido->condPag=='Dinheiro')
                  <option value="Dinheiro" selected>Dinheiro</option>
                  <option value="Cheque">Chque</option>
                  <option value="Cartao">Cartão</option>
             @elseif ($pedido->condPag=='Cheque')
                  <option value="Dinheiro">Dinheiro</option>
                  <option value="Cheque" selected>Cheque</option>
                  <option value="Cartao">Cartao</option>
             @else 
                  <option value="Dinheiro">Dinheiro</option>
                  <option value="Cheque">Cheque</option>
                  <option value="Cartao"selected>Cartao</option>
             @endif
             </select>
          </div>
          <div class="form-group">
            	<label for="total">Mês</label>
            	<input type="mes" name="total" class="form-control" value="{{$pedido->mes}}" placeholder="mes">
            </div>
          <div class="form-group">
            	<label for="total">Mês</label>
            	<input type="number" name="total" class="form-control" value="{{$pedido->obs}}" placeholder="obs">
            </div>
            
     </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection