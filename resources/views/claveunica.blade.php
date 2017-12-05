@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has iniciado sesión!
					
					<form method="post" role="form" action="/oauth">
						<div class="form-group">
							<img src="img/claveunica.png">
						</div>
						<h2 class="form-signin-heading">Por favor, ingrese con su cuenta de ClaveUnica</h2>
						<div class="form-group{{ $errors->has('run') ? ' has-error' : '' }}">
                            <label for="run" class="col-md-4 control-label">Run</label>

                            <div class="col-md-6">
                                <input id="run" type="run" class="form-control" name="run" value="{{ old('run') }}" required autofocus>

                                @if ($errors->has('run'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('run') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Siguiente">
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
