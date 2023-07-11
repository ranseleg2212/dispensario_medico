<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('paciente_id') }}
            {{ Form::text('paciente_id', $pacienter_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? '
            is-invalid' : ''), 'placeholder' => 'Paciente Id', 'readonly' => 'readonly']) }}
            {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medico_id') }}
            {{ Form::text('medico_id', $medico->id, ['class' => 'form-control' . ($errors->has('medico_id') ? ' is-invalid' : ''), 'placeholder' => 'medico_id', 'readonly' => 'readonly']) }}
            {!! $errors->first('medico_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $receta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion')
            ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
</div>
<br>
<table id="tabla-medicamentos" class="table table-hover border">
    <thead>
        <tr class="bg-blue-100">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medicamentos as $medicamento)
        <tr>
            <td>{{$medicamento->id}}</td>
            <td>{{$medicamento->nombre}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<textarea id="medicamentos" name="medicamentos" rows="4" cols="50" style="width: 100%" class="border text-md" readonly></textarea>
<button id="toggleButton" type="button">Activar/Desactivar</button>
<script>
    var textareaMedicamentos = document.getElementById('medicamentos');
    var toggleButton = document.getElementById('toggleButton');

    toggleButton.addEventListener('click', function() {
      textareaMedicamentos.readOnly = !textareaMedicamentos.readOnly;
      toggleButton.textContent = textareaMedicamentos.readOnly ? 'Activar' : 'Desactivar';
    });

    textareaMedicamentos.addEventListener('keydown', function(event) {
      if (event.key === 'Enter') {
        event.preventDefault();
      }
    });
  </script>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary bg-blue-700 w-full my-6">{{ __('Submit') }}</button>
</div>
{{-- <script>
    // Obtenemos la referencia a la tabla y al textarea
var tablaMedicamentos = document.getElementById('tabla-medicamentos');
var textareaMedicamentos = document.getElementById('medicamentos');

// Agregamos un event listener a la tabla para capturar el clic en las filas
tablaMedicamentos.addEventListener('click', function(event) {
  // Verificamos que el evento de clic ocurrió en una fila (tr)
  if (event.target.tagName === 'TD') {
    // Obtenemos los datos de la fila seleccionada
    var fila = event.target.parentNode;
    var id = fila.cells[0].textContent;
    var nombre = fila.cells[1].textContent;

    // Creamos la cadena a agregar al textarea
    var cadena = id + ',' + nombre + ',cantidad;\n';

    // Agregamos la cadena al textarea
    textareaMedicamentos.value += cadena;
  }
});

</script> --}}
<script>
    // Obtenemos la referencia a la tabla y al textarea
    var tablaMedicamentos = document.getElementById('tabla-medicamentos');
    var textareaMedicamentos = document.getElementById('medicamentos');

    // Agregamos un event listener a la tabla para capturar el clic en las filas
    tablaMedicamentos.addEventListener('click', function(event) {
      // Verificamos que el evento de clic ocurrió en una fila (tr)
      if (event.target.tagName === 'TD') {
        // Obtenemos los datos de la fila seleccionada
        var fila = event.target.parentNode;
        var id = fila.cells[0].textContent;
        var nombre = fila.cells[1].textContent;

        // Preguntamos por la cantidad utilizando un modal o un prompt
        var cantidad = prompt('Ingrese la cantidad:');

        // Verificamos si el usuario ingresó una cantidad
        if (cantidad !== null) {
          // Creamos la cadena a agregar al textarea
          var cadena = id + ',' + nombre + ',' + cantidad + ';\n';

          // Agregamos la cadena al textarea
          textareaMedicamentos.value += cadena;
        }
      }
    });
  </script>

