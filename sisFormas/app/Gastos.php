<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table='gastos';
    protected $primaryKey='idgastos';
    public $timestamps=false;

    protected $fillable =[
    'descricao',
    'valor',
    'mes'
    ];
}
