<!doctype html>
<html lang="en">
  <head>
  	<title>BIO-UES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('login-form-14/css/style.css')}}">

	</head>
	<body>
     <nav class="navbar navbar-expand-lg" style="background-color: #D7D2D1;">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="login-form-14/images/ues.svg" width="70" height="70" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">BIO-UES</a>
      </li>
          </ul>
  </div>
</nav>
    <div>
        @yield("container")
    </div>
         <style>
    .bs-example{
        margin: 20px;
    }
    body{
        padding-bottom: 70px;
    }
</style>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg fixed-bottom" style="background-color: #D7D2D1 ;">
        <a class="navbar-brand">Copyright &copy; BIO-UES </a>
            <div >&emsp;<span class="glyphicon glyphicon-copyright-mark"><span id= "fecha"></span></div>
             </nav>
        </div>
    
     <script>
        var f=new Date();
        var fecha = f.getDate() + '-' + (f.getMonth() + 1) + '-' +f.getFullYear();
        var hora = f.getHours() + ':' + f.getMinutes();
        var fechaYhora = fecha + ' , '+hora;
        document.getElementById('fecha').innerHTML = fechaYhora;

</script>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

