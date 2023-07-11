<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rol') }}
            <select name="rol" class="form-control{{ $errors->has('rol') ? ' is-invalid' : '' }}">
              <option value="">Selecciona un rol</option>
              <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="consulta" {{ $user->rol == 'consulta' ? 'selected' : '' }}>Consulta</option>
              <option value="medico" {{ $user->rol == 'medico' ? 'selected' : '' }}>Médico</option>
            </select>
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
          </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
