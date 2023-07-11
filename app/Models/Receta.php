<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Receta
 *
 * @property $id
 * @property $paciente_id
 * @property $medico_id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleReceta[] $detalleRecetas
 * @property Medico $medico
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Receta extends Model
{

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class, 'detalle_recetas')
            ->withPivot('cantidad');
    }


    static $rules = [
		'paciente_id' => 'required',
		'medico_id' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paciente_id','medico_id','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleRecetas()
    {
        return $this->hasMany('App\Models\DetalleReceta', 'receta_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medico()
    {
        return $this->hasOne('App\Models\Medico', 'id', 'medico_id');
        return $this->belongsTo(Medico::class);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        // return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
        // return $this->belongsTo(Paciente::class);
        return $this->belongsTo(Paciente::class);

    }


}
