<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbConta extends Model
{
    protected $attributes = [
        'con_saldo_inicial' => 0.00,
        'con_ativo'         => 1,
    ];
    public $timestamps    = false;
    protected $table      = 'tb_conta';
    protected $primaryKey = 'con_id';
}
