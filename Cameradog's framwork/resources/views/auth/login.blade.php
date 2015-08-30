<!-- login page-->

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Chat room</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href=" {{ asset('css/index.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--font-->
    <link href='http://fonts.googleapis.com/css?family=Orbitron:900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Inconsolata:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fontdiner+Swanky' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>

<body>
  <div class="container text-center">
    <h1>Chat Room</h1>
    <img class="logo" src="../img/Picture.png" alt="logo">
        <br>
					<!-- form  -->
          <div class="login">
              <form class="form-horizontal" role="form" method="POST" action="/auth/login">
  						<input type="hidden" name="_token" value="{{ csrf_token() }}">

  						<div class="form-group">
  							<label class="col-md-4 control-label">E-Mail:</label>
  							<div class="col-md-6">
  								<input type="email" class="form-control" name="email" placeholder="enter email" value="{{ old('email') }}">
  							</div>
  						</div>

  						<div class="form-group">
  							<label class="col-md-4 control-label">Password:</label>
  							<div class="col-md-6">
  								<input type="password" class="form-control" name="password" placeholder="enter password">
  							</div>
  						</div>

  						<div class="form-group">
  							<div class="col-md-6 col-md-offset-4">
  								<div class="checkbox">
  									<label>
  										<input type="checkbox" name="remember"> Remember Me
  									</label>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<div class="col-md-6 col-md-offset-4">
  								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
  									Login
  								</button>

  								<a href="/auth/register">No account? Register here!!</a>
  							</div>
  						</div>
  					</form>

						<!-- notification -->
            @if (count($errors) > 0)
  						<div class="alert alert-danger">
  							<!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
  							<ul>
  								@foreach ($errors->all() as $error)
  									<li>{{ $error }}</li>
  								@endforeach
  							</ul>
  						</div>
  					@endif
          </div>
        <!-- <div class="login">
            Account:&nbsp&nbsp&nbsp &nbsp
            <input class="user" id="logAc" type="text" name="account" placeholder="enter account" value="">
            <br> &nbspPassword:&nbsp&nbsp
            <input class="user" id="logPs" type="password" name="account" placeholder="enter password" value="">
            <br>
            <button id="logBtn" type="button" class="btn btn-warning .active">Log in</button>
            <button id="newAcBtn" type="button" class="btn btn-warning .active" onclick="openwindow()">Set Account</button>
        </div> -->
  </div>
</body>

</html>
