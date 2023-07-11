<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('historial_id') }}
            {{ Form::text('historial_id', $seguimiento->historial_id ?? $historial, ['class' => 'form-control' . ($errors->has('historial_id') ? ' is-invalid' : ''), 'placeholder' => 'Historial Id', 'readonly' => 'readonly']) }}
            {!! $errors->first('historial_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $seguimiento->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resultado') }}
            {{ Form::text('resultado', $seguimiento->resultado, ['class' => 'form-control' . ($errors->has('resultado') ? ' is-invalid' : ''), 'placeholder' => 'Resultado']) }}
            {!! $errors->first('resultado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('diagnostico_definitivo') }}
            {{ Form::text('diagnostico_definitivo', $seguimiento->diagnostico_definitivo, ['class' => 'form-control' . ($errors->has('diagnostico_definitivo') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostico Definitivo']) }}
            {!! $errors->first('diagnostico_definitivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
