<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMetaDespesa extends Model
{
    public $timestamps    = false;
    protected $table      = 'tb_meta_despesa';
    protected $primaryKey = 'mdp_id';
}
