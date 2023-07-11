<?php

namespace App\Http\Controllers;

use App\Models\DetalleReceta;
use Illuminate\Http\Request;

/**
 * Class DetalleRecetaController
 * @package App\Http\Controllers
 */
class DetalleRecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardarDetalleRecetas(Request $request, $recetaId)
    {
        // Obtén los datos del textarea
        $datosMedicamentos = $request->input('medicamentos');

        // Divide los datos por el delimitador ";"
        $medicamentos = explode(';', $datosMedicamentos);

        // Itera sobre los medicamentos y guarda los detalles en la tabla detalle_recetas
        foreach ($medicamentos as $medicamento) {
            // Divide los datos del medicamento por el delimitador ","
            $datos = explode(',', $medicamento);

            // Obtén el id del medicamento y la cantidad
            $medicamentoId = $datos[0];
            $cantidad = $datos[2];

            // Crea una nueva instancia del modelo DetalleReceta y asigna los valores
            $detalleReceta = new DetalleReceta();
            $detalleReceta->receta_id = $recetaId;
            $detalleReceta->medicamento_id = $medicamentoId;
            $detalleReceta->cantidad = $cantidad;

            // Guarda el detalle de la receta en la base de datos
            $detalleReceta->save();
        }
    }

    public function index()
    {
        $detalleRecetas = DetalleReceta::paginate();

        return view('detalle-receta.index', compact('detalleRecetas'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleRecetas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleReceta = new DetalleReceta();
        return view('detalle-receta.create', compact('detalleReceta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleReceta::$rules);

        $detalleReceta = DetalleReceta::create($request->all());

        return redirect()->route('detalle-recetas.index')
            ->with('success', 'DetalleReceta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleReceta = DetalleReceta::find($id);

        return view('detalle-receta.show', compact('detalleReceta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleReceta = DetalleReceta::find($id);

        return view('detalle-receta.edit', compact('detalleReceta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleReceta $detalleReceta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleReceta $detalleReceta)
    {
        request()->validate(DetalleReceta::$rules);

        $detalleReceta->update($request->all());

        return redirect()->route('detalle-recetas.index')
            ->with('success', 'DetalleReceta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleReceta = DetalleReceta::find($id)->delete();

        return redirect()->route('detalle-recetas.index')
            ->with('success', 'DetalleReceta deleted successfully');
    }
}
