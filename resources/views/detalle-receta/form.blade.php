<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('receta_id') }}
            {{ Form::text('receta_id', $detalleReceta->receta_id, ['class' => 'form-control' . ($errors->has('receta_id') ? ' is-invalid' : ''), 'placeholder' => 'Receta Id']) }}
            {!! $errors->first('receta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medicamento_id') }}
            {{ Form::text('medicamento_id', $detalleReceta->medicamento_id, ['class' => 'form-control' . ($errors->has('medicamento_id') ? ' is-invalid' : ''), 'placeholder' => 'Medicamento Id']) }}
            {!! $errors->first('medicamento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $detalleReceta->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>