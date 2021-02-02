<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMetaDespesa extends Model
{
    public $timestamps    = false;
    protected $table      = 'tb_meta_despesa';
    protected $primaryKey = 'mdp_id';

    public function baseDespesa()
    {
        return $this->hasOne('App\Models\TbBaseDespesa', 'bdp_id', 'mdp_despesa');
    }
}
