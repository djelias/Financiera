@extends('auth.loginApp')
 @section('container')
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Ingreso</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url('login-form-14/images/login.png');">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Iniciar Sesión</h3>
			      		</div>
								
			      	</div>
						<form method="POST" action="{{ route('login') }}" class="signin-form">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="label">{{ __('Correo Electrónico') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="label">{{ __('Contraseña') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    {{ __('Entrar') }}
                                    
                                    
                                </button>
                        </div>

<!-- Faceebook Button -->
                        <div class="form-group ">
                                <a href="{{url('/redirect')}}"  class="form-control btn btn-primary rounded submit px-3">
                                Iniciar Sesión con Facebook </a>
                        </div>
<!-- Google Button -->
                        <div class="form-group ">
                                <a href="{{url('auth/google')}}"  class="form-control btn btn-primary rounded submit px-3">
                                   Iniciar Sesión con Google </a>
                        </div>


                          <div class="form-group">
                        <a href="{{ url('/') }}" class="form-control btn btn-danger rounded submit px-3">Cancelar</a>
                    </div>
                        <div class="text-center ">
                        	@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Ha olvidado su contraseña?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
		          <p class="text-center">No esta registrado? <a data-toggle="tab" href="{{ route('register') }}">Registrarse</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
     @endsection