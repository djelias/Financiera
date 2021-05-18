@extends('auth.loginApp')
 @section('container')

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Registrarse</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url('login-form-14/images/peces.jpg');">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Ingrese los datos</h3>
			      		</div>
			      	</div>
							<form action="#" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Nombre de Usuario</label>
			      			<input type="text" class="form-control" placeholder="Usuario" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Contraseña</label>
		              <input type="password" class="form-control" placeholder="Contraseña" required>
		            </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Confirmar Contraseña</label>
		              <input type="password" class="form-control" placeholder="Confirmar Contraseña" required>
		            </div>
		             <div class="form-group mb-3">
		            	<label class="label" for="email">Correo Electrónico</label>
		              <input type="email" class="form-control" placeholder="Correo electrónico" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Registrarse</button>
		            </div>
                    <div class="form-group">
                        <a href="{{ url('/') }}" class="form-control btn btn-danger rounded submit px-3">Cancelar</a>
                    </div>
		            
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
     @endsection