<?php
namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TbUsuario extends Authenticatable implements JWTSubject
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'usu_ativo'     => 1,
        'usu_superuser' => 0,
    ];
    public $timestamps    = false; // prevent created/updated_at
    protected $table      = 'tb_usuario';
    protected $primaryKey = 'usu_id';

    // protected $fillable = ['email', 'name', 'password', 'date_of_birth'];
    // private const HIDDEN_FIELDS = ['password', 'superuser'];

    /*
    public function logs()
    {
        return $this->hasMany('App\Models\UserActionLogs');
    }
    */

    /**
     * Returns the logged user id
     *
     * @return integer|null
     */
    public static function getLoggedUserId()
    {
        return auth()->user()->getAttributes()['usu_id'] ?? null;
    }

    /**
     * Excrypt the password with the chosen crypt method
     *
     * @param string $password
     * @return string
     */
    public static function encryptPassword(string $password)
    {
        return md5($password);
    }

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}