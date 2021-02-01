<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMenu extends Model
{
    protected $attributes = [
        'men_ativo' => 1,
        'men_order' => 0,
    ];
    public $timestamps    = false;
    protected $table      = 'tb_menu';
    protected $primaryKey = 'men_id';
}
