<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historial
 *
 * @property $id
 * @property $paciente_id
 * @property $diagnostico
 * @property $tratamiento
 * @property $pruebas
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Historial extends Model
{

    static $rules = [
        'paciente_id' => 'required',
        'diagnostico' => 'required',
        'tratamiento' => 'required',
        'medico_id' => 'required',
        'auscultacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paciente_id', 'diagnostico', 'tratamiento', 'pruebas', 'observaciones', 'medico_id','auscultacion','saturacion','peso','presion','temperatura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }
}
