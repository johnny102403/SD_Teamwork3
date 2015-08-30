<!-- main pages default layout -->

<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/messageBoard.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
    <!--font-->
    <link href='http://fonts.googleapis.com/css?family=Orbitron:900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Inconsolata:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fontdiner+Swanky' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>

<body data-spy="scroll" data-target=".navbar">

    <div class="header container-fluid text-center">
        <h1 class="h">Enjoy Your Chat Time!</h1>
    </div>

    <nav class="navbar navbar-inverse container-fluid" data-spy="affix" data-offset-top="200">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/main"><span class="glyphicon glyphicon-home"></span>&nbspHome</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav ">
                <li><a href="/main/create"><span class="glyphicon glyphicon-envelope"></span>&nbspNew Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-in"></span>&nbspLog out</a></li>
            </ul>
        </div>
    </nav>

	<!-- notification -->
	@if(Session::has('flash_store'))
		<div class='alert alert-success'>{{ Session::get('flash_store')}}</div>
	@elseif(Session::has('flash_edit'))
		<div class='alert alert-info'>{{ Session::get('flash_edit')}}</div>
	@elseif(Session::has('flash_delete'))
		<div class='alert alert-danger'>{{ Session::get('flash_delete')}}</div>
	@elseif(Session::has('flash_mod'))
		<div class='alert alert-danger'>{{ Session::get('flash_mod')}}</div>
	@endif

	<!-- main content -->
  @yield('content')

	<!-- notifications animation -->
	<script>
			$('div.alert').delay(3000).fadeOut(500);
	</script>
</body>

</html>
