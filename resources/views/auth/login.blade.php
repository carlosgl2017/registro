@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="-webkit-box-shadow: 15px 11px 98px -11px rgba(0,0,0,0.66);
-moz-box-shadow: 15px 11px 98px -11px rgba(0,0,0,0.66);
box-shadow: 15px 11px 98px -11px rgba(0,0,0,0.66);">
                <div class="card-header" style=" background-image: linear-gradient(to right, #2F8D06 0%, #2F8D06 100%); color:white; text-align:center; font-size:16px;font-weight: bold;">{{ __('Ingresar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Dirección de correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" >
                                <button type="submit" class="btn btn-success" style="background:#2F8D06">
                                    {{ __('Ingresar') }}
                                </button>                      
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
