<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" 
tabindex="=1" id="modal-delete-{{$cat->idgastos}}">
{{Form::Open(array('action'=>array('GastosController@destroy',$cat->idgastos),'method'=>'delete'))}}
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close" >
             <span aria-hidden="true">x</span>
             <h4 class="modal-title">Deletar Gasto</h4>
          </button>
     
      </div>
      <div class="modal-body">
      <p>Quer realmente deletar esse gasto?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
   </div>

</div>
{{Form::Close()}}
</div> 