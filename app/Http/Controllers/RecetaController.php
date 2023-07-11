<?php

namespace App\Http\Controllers;

use App\Models\DetalleReceta;
use App\Models\Medicamento;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



/**
 * Class RecetaController
 * @package App\Http\Controllers
 */
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::paginate();

        return view('receta.index', compact('recetas'))
            ->with('i', (request()->input('page', 1) - 1) * $recetas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pacienter_id)
    {
        $receta = new Receta();
        //$medicos = Medico::all();
        $medicamentos = Medicamento::all();
        $user = Auth::user();
        $medico = Medico::where('user_id', $user->id)->first();
        return view('receta.create', compact('receta', 'pacienter_id', 'medico', 'medicamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Obtén los datos del formulario
        $pacienteId = $request->input('paciente_id');
        $medicoId = $request->input('medico_id');
        $descripcion = $request->input('descripcion');
        $medicamentos = $request->input('medicamentos');

        // Crea una nueva instancia del modelo Receta y asigna los valores
        $receta = new Receta();
        $receta->paciente_id = $pacienteId;
        $receta->medico_id = $medicoId;
        $receta->descripcion = $descripcion;

        // Guarda la receta en la base de datos
        $receta->save();

        // Obtén el ID de la receta insertada
        $recetaId = $receta->id;

        // Llama al método para guardar los detalles de los medicamentos
        $this->guardarDetalleRecetas($request, $recetaId);

        // Redirecciona o realiza otras acciones después de guardar los datos
        // ...

        // Por ejemplo, podrías redireccionar al usuario a una página de éxito
        return redirect()->route('pacientes.show', $pacienteId)->with('success', 'Receta guardada exitosamente.');
    }

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

            // Verifica si existen suficientes partes en los datos
            if (count($datos) >= 3) {
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
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = Receta::with(['medicamentos','paciente','medico'])->find($id);

        return view('receta.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receta = Receta::find($id);

        return view('receta.edit', compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        request()->validate(Receta::$rules);

        $receta->update($request->all());

        return redirect()->route('recetas.index')
            ->with('success', 'Receta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $receta = Receta::find($id)->delete();

        return redirect()->route('recetas.index')
            ->with('success', 'Receta deleted successfully');
    }
}
