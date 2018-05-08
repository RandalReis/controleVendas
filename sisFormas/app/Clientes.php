<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table='clientes';
    protected $primaryKey='idclientes';
    public $timestamps=false;

    protected $fillable =[
      'nome',
      'endereco',
      'telefone',
      'obs'  
    ];
}
