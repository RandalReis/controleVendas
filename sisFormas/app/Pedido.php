<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='pedido';
    protected $primaryKey='idpedido';
    public $timestamps=false;

    protected $fillable =[
        'descricao',
        'quantidade',
        'valorPar',
        'total',
        'condPag',
        'mes',
        'obs',
        'idclientes'
        
    ];

}
