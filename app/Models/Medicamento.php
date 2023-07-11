<?php

namespace App\Models;
use App\Models\DetalleReceta;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicamento
 *
 * @property $id
 * @property $nombre
 * @property $cantidad
 * @property $precio_compra
 * @property $precio_venta
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleReceta[] $detalleRecetas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medicamento extends Model
{


    static $rules = [
		'nombre' => 'required',
		'cantidad' => 'required',
		'precio_compra' => 'required',
		'precio_venta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cantidad','precio_compra','precio_venta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleRecetas()
    {
        return $this->hasMany('App\Models\DetalleReceta', 'medicamento_id', 'id');
        return $this->hasMany(DetalleReceta::class, 'medicamento_id');
    }


}
