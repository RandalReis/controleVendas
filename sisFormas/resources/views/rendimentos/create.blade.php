@extends ('adminlte::page')
@section ('title','Rendimentos')
@section ('content_header')
@stop
@section('content')
  <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nova Entrada</h3>
        @if (count($errors)>0)
        <div class="alert" alert-danger>
            <ul>
              @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
              @endforeach 
            </ul>
        </div>
        @endif  

        {!!Form::open(array('url'=>'rendimentos','method'=>'POST','autocomplete'=>'off')) !!}
        {{Form::token()}}
        <div class="form-group">
           <label for="nome">Mês</label>
           <input type="text" name="mes" class="form-control" placeholder="Mês">
        </div>

        <div class="form-group">
           <label for="total">Total</label>
           <input type="number" name="total" class="form-control" placeholder="Total">
        </div>
        <div class="form-group">
           <button class="btn btn-primary" type="submit">Salvar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
     </div>
  </div>
@stop