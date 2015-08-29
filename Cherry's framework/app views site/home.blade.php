<!--app/views/site/home.blade.php-->
@extends('site.layouts.default')

@section('content')
    <div class="container text-center">
    	{{<h1>Chat Room</h1>}}
    	{{ HTML::image('img/Picture.png') }}
    	<!--Picture put in public/img-->
    	<br>
    	<div class="login">
	        @{{'Account:'}}
	        <input class="user" id="logAc" type="text" name="account" placeholder="enter account" value=""><br> 
	        @{{'Password:'}}
	        <input class="user" id="logPs" type="password" name="account" placeholder="enter password" value="">
	        <br>
	        <button id="logBtn" type="button" class="btn btn-warning .active">Log in</button>
	        <button id="newAcBtn" type="button" class="btn btn-warning .active" onclick="openwindow()">Set Account</button>
	    </div>
	</div>

	{{ HTML::style('css/site/index.css') }}
	<!--Picture put in public/css/site-->
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/login.js') }}
	{{ HTML::script('js/newWindow.js') }}
	<!--public/js-->
@stop