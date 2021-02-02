<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbLancamento extends Model
{
    protected $attributes = [
        'lan_confirmado' => 0,
    ];
    public $timestamps    = false;
    protected $table      = 'tb_lancamento';
    protected $primaryKey = 'lan_id';

    public function baseDespesa()
    {
        return $this->hasOne('App\Models\TbBaseDespesa', 'bdp_id', 'lan_categoria');
    }

    public function conta()
    {
        return $this->hasOne('App\Models\TbConta', 'con_id', 'lan_conta');
    }
}
