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
						<div class="img" style="background-image: url('login-form-14/images/garrobo.jpg');">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Iniciar Sesión</h3>
			      		</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>-->
			      	</div>
							<form action="#" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Usuario</label>
			      			<input type="text" class="form-control" placeholder="Usuario" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Contraseña</label>
		              <input type="password" class="form-control" placeholder="Contraseña" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
		            </div>
                    <div class="form-group">
                        <a href="{{ url('/') }}" class="form-control btn btn-danger rounded submit px-3">Cancelar</a>
                    </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Recuerdame
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Ha olvidado su contraseña?</a>
									</div>
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