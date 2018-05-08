<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendimentos extends Model
{
    protected $table='rendimentos';
    protected $primaryKey='idrendimentos';
    public $timestamps=false;

    protected $fillable =[
         'mes',
         'total',
         'idgastos',
         'idpedido'
    ];
}
