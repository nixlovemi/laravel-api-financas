<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbBaseDespesa extends Model
{
    protected $attributes = [
        'bdp_contabiliza' => 1,
        'bdp_ativo'       => 1,
    ];
    public $timestamps    = false;
    protected $table      = 'tb_base_despesa';
    protected $primaryKey = 'bdp_id';
}
