<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('paciente_id') }}
            {{ Form::text('paciente_id', $paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id', 'readonly' => 'readonly']) }}
            {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('síntomas') }}
            {{ Form::text('diagnostico', $historial->diagnostico, ['class' => 'form-control' . ($errors->has('diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostico']) }}
            {!! $errors->first('diagnostico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tratamiento') }}
            {{ Form::text('tratamiento', $historial->tratamiento, ['class' => 'form-control' . ($errors->has('tratamiento') ? ' is-invalid' : ''), 'placeholder' => 'Tratamiento']) }}
            {!! $errors->first('tratamiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pruebas') }}
            {{ Form::text('pruebas', $historial->pruebas, ['class' => 'form-control' . ($errors->has('pruebas') ? ' is-invalid' : ''), 'placeholder' => 'Pruebas']) }}
            {!! $errors->first('pruebas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $historial->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medico_id') }}
            {{ Form::text('medico_id', $historial->medico_id ?? $medico->id, ['class' => 'form-control' . ($errors->has('medico_id') ? ' is-invalid' : ''), 'placeholder' => 'medico_id', 'readonly' => 'readonly']) }}
            {!! $errors->first('medico_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <table class="table border">
            <thead>
              <tr>
                <th scope="col" colspan="2" class="text-center">Vitales</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{ Form::label('presion') }}</th>
                <td>{{ Form::text('presion', $historial->presion, ['class' => 'form-control' . ($errors->has('presion') ? ' is-invalid' : ''), 'placeholder' => 'presion',]) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ Form::label('temperatura') }}</th>
                <td>{{ Form::number('temperatura', $historial->temperatura, ['class' => 'form-control' . ($errors->has('temperatura') ? ' is-invalid' : ''), 'placeholder' => 'temperatura',]) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ Form::label('peso') }}</th>
                <td>{{ Form::text('peso', $historial->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'peso',]) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ Form::label('saturacion de oxigeno') }}</th>
                <td>{{ Form::number('saturacion', $historial->saturacion, ['class' => 'form-control' . ($errors->has('saturacion') ? ' is-invalid' : ''), 'placeholder' => 'saturacion',]) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ Form::label('auscultación pulmonar') }}</th>
                <td>{{ Form::text('auscultacion', $historial->auscultacion, ['class' => 'form-control' . ($errors->has('auscultacion') ? ' is-invalid' : ''), 'placeholder' => 'auscultacion',]) }}</td>
              </tr>
            </tbody>
          </table>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
