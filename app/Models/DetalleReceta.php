<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleReceta
 *
 * @property $id
 * @property $receta_id
 * @property $medicamento_id
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Medicamento $medicamento
 * @property Receta $receta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleReceta extends Model
{


    static $rules = [
		'receta_id' => 'required',
		'medicamento_id' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['receta_id','medicamento_id','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medicamento()
    {
        return $this->hasOne('App\Models\Medicamento', 'id', 'medicamento_id');
        return $this->belongsTo(Medicamento::class, 'medicamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function receta()
    {
        return $this->hasOne('App\Models\Receta', 'id', 'receta_id');
    }


}
