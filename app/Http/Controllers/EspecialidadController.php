<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

/**
 * Class EspecialidadController
 * @package App\Http\Controllers
 */
class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidads = Especialidad::paginate();

        return view('especialidad.index', compact('especialidads'))
            ->with('i', (request()->input('page', 1) - 1) * $especialidads->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidad = new Especialidad();
        return view('especialidad.create', compact('especialidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Especialidad::$rules);

        $especialidad = Especialidad::create($request->all());

        return redirect()->route('especialidads.index')
            ->with('success', 'Especialidad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidad = Especialidad::find($id);

        return view('especialidad.show', compact('especialidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidad = Especialidad::find($id);

        return view('especialidad.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Especialidad $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar los datos enviados en la solicitud
        $request->validate([
            'nombre' => 'required',
            // Agrega aquí las reglas de validación adicionales según tus necesidades
        ]);

        // Buscar el medicamento por su ID en la base de datos
        $especialidad = Especialidad::findOrFail($id);

        // Actualizar los atributos del modelo con los datos enviados en la solicitud
        $especialidad->nombre = $request->input('nombre');
        // Actualiza aquí los demás atributos según tus necesidades

        // Guardar los cambios en la base de datos
        $especialidad->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('especialidads.index')->with('success', 'Medico actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $especialidad = Especialidad::find($id)->delete();

        return redirect()->route('especialidads.index')
            ->with('success', 'Especialidad deleted successfully');
    }
}
