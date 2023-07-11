<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $identificacion
 * @property $fecha_nacimiento
 * @property $genero
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $alergias
 * @property $condiciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Historial[] $historials
 * @property Receta[] $recetas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{

    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'identificacion' => 'required',
		'fecha_nacimiento' => 'required',
		'genero' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','identificacion','fecha_nacimiento','genero','direccion','telefono','email','alergias','condiciones','alcohol','tabaco','drogas','infusiones','comentario','antecedentes_fam','edad','ocupacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historials()
    {
        return $this->hasMany('App\Models\Historial', 'paciente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recetas()
    {
        return $this->hasMany('App\Models\Receta', 'paciente_id', 'id');
    }


}
