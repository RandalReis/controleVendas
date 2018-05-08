@extends ('adminlte::page')
@section ('title','Pedidos')
@section ('content_header')
@stop
@section('content')
  <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Novo Pedido</h3>
        @if (count($errors)>0)
        <div class="alert" alert-danger>
            <ul>
              @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
              @endforeach 
            </ul>
        </div>
        @endif  
     </div>
  </div>
        {!!Form::open(array('url'=>'pedido','method'=>'POST','autocomplete'=>'off')) !!}
        {{Form::token()}}
   <div class="row">   
     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
           <label for="descricao">Descrição</label>
           <input type="text" name="descricao" class="form-control" placeholder="Descrição">
        </div>
     </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
             <label for="quantidade">Quantidade</label>
             <input type="number" name="quantidade" class="form-control" placeholder="Quantidade">
          </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
             <label for="valorPar">Valor por par</label>
             <input type="number" name="valorPar" class="form-control" placeholder="Valor por Par">
          </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
             <label for="total">Total</label>
             <input type="number" name="total" class="form-control" placeholder="Total">
          </div>
        </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
             <label>Condição de Pagamento</label>
             <select name="condPag" class="form-control">
             <option value="Dinheito">Dinheiro</option>
             <option value="Cheque">Cheque</option>
             <option value="Cartao">Cartão</option>
             </select>
          </div>
      </div>  
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">     
        <div class="form-group">
           <label for="mes">Mês</label>
           <input type="text" name="mes" class="form-control" placeholder="Mês">
        </div>
      </div>  
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
           <label for="obs">Observação</label>
           <input type="text" name="obs" class="form-control" placeholder="Observação">
        </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
           <label for="idclientes">Cliente</label>
           <input type="number" name="idcliente" class="form-control" placeholder="Código do Cliente">
        </div>
      </div>
     
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
           <button class="btn btn-primary" type="submit">Salvar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>  
        {!!Form::close()!!}
     </div>
  </div>
@stop


