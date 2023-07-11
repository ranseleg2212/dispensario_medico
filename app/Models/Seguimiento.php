<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seguimiento
 *
 * @property $id
 * @property $historial_id
 * @property $comentario
 * @property $resultado
 * @property $diagnostico_definitivo
 *
 * @property Historial $historial
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Seguimiento extends Model
{
    
    static $rules = [
		'historial_id' => 'required',
		'comentario' => 'required',
		'resultado' => 'required',
		'diagnostico_definitivo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['historial_id','comentario','resultado','diagnostico_definitivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function historial()
    {
        return $this->hasOne('App\Models\Historial', 'id', 'historial_id');
    }
    

}
