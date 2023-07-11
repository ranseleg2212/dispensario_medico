<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class MedicoController
 * @package App\Http\Controllers
 */
class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::paginate();

        return view('medico.index', compact('medicos'))
            ->with('i', (request()->input('page', 1) - 1) * $medicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$medico = new Medico();
        $especialidades = Especialidad::all();
        $usuarios = User::all();
        return view('medico.create',compact('especialidades','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medico::$rules);

        $medico = Medico::create($request->all());

        return redirect()->route('medicos.index')
            ->with('success', 'Medico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::find($id);
        $usuario = $medico->user;

        return view('medico.show', compact('medico','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::find($id);
        $especialidades = Especialidad::all();
        $usuarios = User::all();
        return view('medico.edit', compact('medico','especialidades','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medico $medico
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Medico $medico)
    // {
    //     request()->validate(Medico::$rules);

    //     $medico->update($request->all());

    //     return redirect()->route('medicos.index')
    //         ->with('success', 'Medico updated successfully');
    // }
    public function update(Request $request, $id)
    {
        // Validar los datos enviados en la solicitud
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required',
            'especialidad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            // Agrega aquí las reglas de validación adicionales según tus necesidades
        ]);

        // Buscar el medicamento por su ID en la base de datos
        $medico = Medico::findOrFail($id);

        // Actualizar los atributos del modelo con los datos enviados en la solicitud
        $medico->nombre = $request->input('nombre');
        $medico->apellido = $request->input('apellido');
        $medico->identificacion = $request->input('identificacion');
        $medico->especialidad = $request->input('especialidad');
        $medico->direccion = $request->input('direccion');
        $medico->telefono = $request->input('telefono');
        $medico->email = $request->input('email');
        $medico->user_id = $request->input('user_id');
        // Actualiza aquí los demás atributos según tus necesidades

        // Guardar los cambios en la base de datos
        $medico->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('medicos.index')->with('success', 'Medico actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medico = Medico::find($id)->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'Medico deleted successfully');
    }
}
